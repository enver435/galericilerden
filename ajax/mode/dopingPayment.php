<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-19 13:51:10
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-07 15:09:15
	
	if(session('login'))
	{
		$userInfo        = $User->userInfo(session('userId'));
		$dopingPriceType = ($userInfo['user_status'] == 1) ? 'doping_individual_price' : 'doping_corporate_price';

		$cardNumber     = post('number');
		$cardNumber     = str_replace(' ', '', $cardNumber);
		$cardHolderName = post('name');
		$cardExpiry     = post('expiry');
		$cardExpiry     = str_replace(' ', '', $cardExpiry);
		$cardCvc        = post('cvc');
		$totalPrice     = post('totalPrice');
		$dopings        = post('dopings');

		$dopings          = explode('|', $dopings);
		$dopingTotalPrice = 0;
		foreach ($dopings as $doping) 
		{
			if($doping == 1 || $doping == 2 || $doping == 3 || $doping == 4)
			{
				$dopingInfo = $Doping->dopingInfo($doping);

				$dopingTotalPrice += $dopingInfo[$dopingPriceType];
			}
		}

		if($cardNumber != '' AND strlen($cardNumber) >= 16 AND $cardHolderName != '' AND strlen($cardExpiry) >= 4 AND strlen($cardCvc) >= 3 AND $totalPrice > 0 AND $totalPrice == $dopingTotalPrice AND !empty($dopings))
		{
			$cardExpiry = explode('/', $cardExpiry);

			if(!empty($userInfo))
			{
				$cityInfo = $Other->cityInfo($userInfo['city']);

				# create request class
				$request = new \Iyzipay\Request\CreatePaymentRequest();
				$request->setLocale(\Iyzipay\Model\Locale::TR);
				//$request->setConversationId("123456789"); // olmasada olar
				$request->setPrice($totalPrice); // total price
				$request->setPaidPrice($totalPrice); // total price
				$request->setCurrency(\Iyzipay\Model\Currency::TL);
				$request->setInstallment(1); // birdefelik odeme (tekcekim)
				$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
				$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

				$paymentCard = new \Iyzipay\Model\PaymentCard();
				$paymentCard->setCardHolderName($cardHolderName);
				$paymentCard->setCardNumber($cardNumber);
				$paymentCard->setExpireMonth($cardExpiry[0]);
				$paymentCard->setExpireYear($cardExpiry[1]);
				$paymentCard->setCvc($cardCvc);
				$paymentCard->setRegisterCard(0); // karti yadda saxlamaq ucundu (0, 1)
				$request->setPaymentCard($paymentCard);

				$buyer = new \Iyzipay\Model\Buyer();
				$buyer->setId($userInfo['id']); // istifadeci id
				$buyer->setName($userInfo['name']); // istifadeci adi
				$buyer->setSurname($userInfo['surname']); // istifadei soyadi
				$buyer->setGsmNumber($userInfo['phone']); // istifadeci nomresi
				$buyer->setEmail($userInfo['email']); // istifadeci emaili
				$buyer->setIdentityNumber($userInfo['tc']); // istifadeci tc no
				$buyer->setRegistrationAddress($userInfo['address']); // istifadeci adresi
				$buyer->setIp($_SERVER['REMOTE_ADDR']); // istifadeci ip
				$buyer->setCity($cityInfo['CityName']); // istifadeci seheri (il)
				$buyer->setCountry('Türkiye'); // istifadeci olkesi
				$request->setBuyer($buyer);

				$shippingAddress = new \Iyzipay\Model\Address();
				$shippingAddress->setContactName($userInfo['name'] . ' ' . $userInfo['surname']); // istifadeci adi
				$shippingAddress->setCity($cityInfo['CityName']); // istifadeci seheri (il)
				$shippingAddress->setCountry('Türkiye'); // istifadeci olkesi
				$shippingAddress->setAddress($userInfo['address']); // istifadeci adresi
				$request->setShippingAddress($shippingAddress);

				$billingAddress = new \Iyzipay\Model\Address();
				$billingAddress->setContactName($userInfo['name'] . ' ' . $userInfo['surname']);
				$billingAddress->setCity($cityInfo['CityName']);
				$billingAddress->setCountry('Türkiye');
				$billingAddress->setAddress($userInfo['address']);
				$request->setBillingAddress($billingAddress);

				// foreach a salacam. butun alinan dopingleri.
				$dopings     = explode('|', $dopings);
				$basketItems = array();
				foreach ($dopings as $doping) 
				{
					if($doping == 1 || $doping == 2 || $doping == 3 || $doping == 4)
					{
						$dopingInfo = $Doping->dopingInfo($doping);

						if($dopingInfo !== false)
						{
							$basketItem = new \Iyzipay\Model\BasketItem();
							$basketItem->setId($doping);
							$basketItem->setName($dopingInfo['doping_name']);
							$basketItem->setCategory1('Doping');
							$basketItem->setCategory2('İlan Doping');
							$basketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
							$basketItem->setPrice($dopingInfo['doping_price']);

							array_push($basketItems, $basketItem);
						}
					}
				}
				$request->setBasketItems($basketItems);

				# make request
				$payment = \Iyzipay\Model\Payment::create($request, Config::options());

				# print response
				$paymentErrorCode = $payment->getErrorCode();
				if($paymentErrorCode != '')
				{
					if($paymentErrorCode == 5026 || $paymentErrorCode == 5028 || $paymentErrorCode == 8)
					{
						$response['error'] = 'Lütfen fatura bilgilerinizi eksiksiz bir şekilde giriniz';
					}
					else
					{
						$response['error'] = $payment->getErrorMessage();
					}
				}
				else
				{
					setSession('dopingPaymentSuccess', true); // odenisi success edek ki post edende orda yoxlayacam
					$response['success'] = 'success';
				}
			}
			else
			{
				$response['error'] = 'usernotfound';
			}
		}
		else
		{
			$response['error'] = 'Lütfen gerekli alanları düzgün şekilde doldurunuz';
		}

		echo json_encode($response);
	}

?>