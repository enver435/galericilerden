<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-15 16:02:35
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-21 08:26:31
	
	Class Modul
	{

		private $db, $query, $categoryInfo, $moduls, $htmlInput, $htmlSelect, $options, $features_groups, $groupsHtml, $groupList;

		protected $lockStatus = false;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function categoryModulItems($categoryIDS, $adAdd = true, $adId = null)
		{
			for($i = 10; $i >= 0; $i--)
			{
				if($adAdd === true)
				{
					if(@$categoryIDS[$i] != '' AND @$categoryIDS[$i] != 0)
					{
						if($this->lockStatus === false)
						{
							$this->categoryInfo = $this->db->from('category')
								->where('Id', $categoryIDS[$i])
								->where('Id', 58, '!=')
								->first();

							if(!empty($this->categoryInfo))
							{
								$modulInfo = $this->db->from('moduls')
									->where('Id', $this->categoryInfo['modul'])
									->first();

								if(!empty($modulInfo))
								{
									$this->query = $this->db->from('modulitems')
										->where('modulsId', $this->categoryInfo['modul'])
										->run();

									if(!empty($this->query))
									{
										foreach ($this->query as $modul) 
										{
											$this->moduls[] = $modul;
										}

										if(!empty($this->moduls))
										{
											$this->lock();

											$modulId = $this->categoryInfo['modul'];
										}
									}
								}
							}
						}
					}
				}
			}

			if($adAdd === true)
			{
				if(!empty($this->moduls))
				{
					return array(
						'template' => $this->modulItemsRender($this->moduls, $adAdd, $adId),
						'modulId'  => $modulId
					);
				}
			}

			if($adAdd === false || $adAdd === null)
			{
				if($categoryIDS != '' AND $categoryIDS != 0)
				{
					if($this->lockStatus === false)
					{
						$moduls = array();

						$this->categoryInfo = $this->db->from('category')
							->where('Id', $categoryIDS)
							->first();

						if(!empty($this->categoryInfo))
						{
							$modulInfo = $this->db->from('moduls')
								->where('Id', $this->categoryInfo['modul'])
								->first();

							if(!empty($modulInfo))
							{
								$this->lock();

								if($this->categoryInfo['modul'] > 0)
								{
									setSession('modulId', $this->categoryInfo['modul']);
								}
								else
								{
									removeSession('modulId');
								}

								$this->query = $this->db->from('modulitems')
									->where('modulsId', $this->categoryInfo['modul'])
									->run();

								if(!empty($this->query))
								{
									foreach ($this->query as $modul) 
									{
										$moduls[] = $modul;
									}
								}
								else
								{
									if($this->categoryInfo['ustkategoriId'] > 0)
									{
										if($this->categoryModulItems($this->categoryInfo['ustkategoriId'], $adAdd, $adId)['template'] != '')
										{
											$this->lock();
										}
										else
										{
											$this->unlock();
										}
									}
								}
							}
							else
							{
								if($this->categoryInfo['ustkategoriId'] > 0)
								{
									if($this->categoryModulItems($this->categoryInfo['ustkategoriId'], $adAdd, $adId)['template'] != '')
									{
										$this->lock();
									}
									else
									{
										$this->unlock();
									}
								}
							}
						}
						else
						{
							removeSession('modulId');
						}

						if($adAdd === null) { $adAdd = true; } // true edekki render de problem olmasin

						$render = $this->modulItemsRender($moduls, $adAdd, $adId);
						
						if($render != '' AND $this->lockStatus === true)
						{
							if($render != '')
							{
								setSession('render', $render);
							}
						}
						elseif($this->lockStatus === false)
						{
							removeSession('render');
						}

						return array(
							'modulId'  => session('modulId'),
							'template' => session('render'),
						);
					}
				}
			}
		}

		public function getCategoryModul($categoryIDS)
		{
			if($categoryIDS != '' AND $categoryIDS != 0)
			{
				if($this->lockStatus === false)
				{
					$this->categoryInfo = $this->db->from('category')
						->where('Id', $categoryIDS)
						->first();

					if(!empty($this->categoryInfo))
					{
						$modulInfo = $this->db->from('moduls')
							->where('Id', $this->categoryInfo['modul'])
							->first();

						if(!empty($modulInfo))
						{
							$this->lock();

							if($this->categoryInfo['modul'] > 0)
							{
								setSession('modulId', $this->categoryInfo['modul']);
							}
							else
							{
								removeSession('modulId');
							}
						}
					}
					else
					{
						removeSession('modulId');
					}

					return array(
						'modulId' => session('modulId')
					);
				}
			}
		}

		private function modulItemsRender($moduls, $adAdd, $adId = null)
		{
			$Ads = new Ads($this->db);

			if(!empty($moduls))
			{
				foreach ($moduls as $item) 
				{
					$div = ($adAdd === true) ? 'form-group col-md-3 col-sm-4 col-xs-12' : 'form-group col-md-12 col-sm-12 col-xs-12';

					if($item['classx'] == 1)
					{
						if($adAdd === true)
						{
							if($adId === null) // ad-add page
							{
								$this->htmlInput .= '
									<div class="' . $div . '">
										<label>' . $item['name'] . '</label>
										<input type="number" step="any" name="item[' . $item['Id'] . '][]" class="form-control"  style="height: 100%;" />
									</div>
								';
							}
							else // ad-edit page
							{
								$adItemInfo = $Ads->adItemInfo($adId, $item['Id']);
								$value      = ($adItemInfo !== false) ? $adItemInfo['itemValue'] : '';
								
								$this->htmlInput .= '
									<div class="' . $div . '">
										<label>' . $item['name'] . '</label>
										<input type="number" step="any" name="item[' . $item['Id'] . '][]" value="' . $value . '" class="form-control"  style="height: 100%;" />
									</div>
								';
							}
						}
						else // search
						{
							$this->htmlInput .= '
								<div class="' . $div . '">
									<label>' . $item['name'] . '</label>
									<div class="row input-inline" style="margin-top: 0;">
										<div class="col-md-6 col-xs-12" style="padding-left: 0;">
											<input type="number" step="any" name="item_' . $item['Id'] . '_min" placeholder="min" class="form-control" value="' . @$_GET['item_' . $item['Id'] . '_min'] . '" style="height: 100%;" />
										</div>
										<div class="col-md-6 col-xs-12" style="padding-right: 0;">
											<input type="number" step="any" name="item_' . $item['Id'] . '_max" placeholder="max" class="form-control" value="' . @$_GET['item_' . $item['Id'] . '_max'] . '" style="height: 100%;" />
										</div>
									</div>
								</div>
							';
						}
					}
					elseif($item['classx'] == 2)
					{
						foreach ($this->categoryModulItemsOptions($item['Id']) as $optionValue) 
						{
							if($optionValue['Id'] != '' AND $optionValue['name'] != '')
							{
								if($adAdd === true)
								{
									if($adId === null) // ad-add page
									{
										$this->options .= '
											<option value="' . $optionValue['Id'] . '">' . $optionValue['name'] . '</option>
										';
									}
									else // ad-edit page
									{
										$adItemSelectInfo = $Ads->adItemSelectInfo($adId, $item['Id'], $optionValue['Id']);
										$selected         = ($adItemSelectInfo !== false) ? 'selected="selected"' : '';

										$this->options .= '
											<option value="' . $optionValue['Id'] . '" ' . $selected . '>' . $optionValue['name'] . '</option>
										';
									}
								}
								else // search
								{
									if(@$_GET['item_' . $item['Id']] == $optionValue['Id'])
									{
										$this->options .= '
											<option value="' . $optionValue['Id'] . '" selected="">' . $optionValue['name'] . '</option>
										';
									}
									else
									{
										$this->options .= '
											<option value="' . $optionValue['Id'] . '">' . $optionValue['name'] . '</option>
										';
									}
								}
							}
						}

						if($adAdd === true)
						{
							if($adId === null) // ad-add page
							{
								$this->htmlSelect .= '
									<div class="' . $div . '">
										<label>' . $item['name'] . '</label>
										<select name="item[' . $item['Id'] . '][]" class="form-control" style="height: 100%;">
											<option value="0" selected="selected">Seçiniz</option>
											' . $this->options . '
										</select>
									</div>
								';
							}
							else // ad-edit page
							{
								$adItemInfo = $Ads->adItemInfo($adId, $item['Id']);
								$selected   = ($adItemInfo === false) ? 'selected="selected"' : '';

								$this->htmlSelect .= '
									<div class="' . $div . '">
										<label>' . $item['name'] . '</label>
										<select name="item[' . $item['Id'] . '][]" class="form-control" style="height: 100%;">
											<option value="0" ' . $selected . '>Seçiniz</option>
											' . $this->options . '
										</select>
									</div>
								';
							}
						}
						else // search
						{
							$this->htmlSelect .= '
								<div class="' . $div . '">
									<label>' . $item['name'] . '</label>
									<select name="item_' . $item['Id'] . '" class="form-control" style="height: 100%;">
										<option value="0" selected="selected">Seçiniz</option>
										' . $this->options . '
									</select>
								</div>
							';
						}
						
						$this->options = '';
					}
					elseif($item['classx'] == 3)
					{
						if($adAdd === true)
						{
							if($adId === null) // ad-add page
							{
								$this->htmlInput .= '
									<div class="' . $div . '">
										<label>' . $item['name'] . '</label>
										<input type="text" name="item[' . $item['Id'] . '][]" class="form-control"  style="height: 100%;" />
									</div>
								';
							}
							else // ad-edit page
							{
								$adItemInfo = $Ads->adItemInfo($adId, $item['Id']);
								$value      = ($adItemInfo !== false) ? $adItemInfo['itemValue'] : '';

								$this->htmlInput .= '
									<div class="' . $div . '">
										<label>' . $item['name'] . '</label>
										<input type="text" name="item[' . $item['Id'] . '][]" value="' . $value . '" class="form-control"  style="height: 100%;" />
									</div>
								';
							}
						}
						else // search
						{
							$this->htmlInput .= '
								<div class="' . $div . '">
									<label>' . $item['name'] . '</label>
									<input type="text" name="item_' . $item['Id'] . '" class="form-control"  style="height: 100%;" />
								</div>
							';
						}
					}
				}

				return '
					<div class="form-group">
						<div class="row">
							' . $this->htmlInput . $this->htmlSelect . '
						</div>
					</div>
				';

				$this->htmlInput  = '';
				$this->htmlSelect = '';
			}
			return false;
		}

		private function categoryModulItemsOptions($itemId)
		{
			$this->query = $this->db->from('modulitemsselect')
				->where('itemId', $itemId)
				->run();

			return $this->query;
		}

		public function categoryFeatures($modulId, $adAdd = true, $adId = null)
		{
			$this->features_groups = $this->db->from('features_groups')
				->where('modulId', $modulId)
				->run();

			if(!empty($this->features_groups))
			{
				foreach ($this->features_groups as $group) 
				{
					$notfound      = 0;
					$featuresLists = $this->categoryFeaturesList($group['Id']);

					if(!empty($featuresLists))
					{
						foreach ($featuresLists as $list) 
						{
							if($adAdd === true)
							{
								if($adId === null) // ad-add page
								{
									$this->groupList .= '
										<div class="form-group col-md-3 col-sm-3 col-xs-12" style="position: relative;">
											<input type="checkbox" name="features[]" value="' . $list['Id'] . '" class="magic-checkbox" />
											<label>' . $list['name'] . '</label>
										</div>
									';
								}
								else // ad-edit page
								{
									$Ads = new Ads($this->db);

									$this->groupList .= '
										<div class="form-group col-md-3 col-sm-3 col-xs-12" style="position: relative;">
											<input type="checkbox" name="features[]" ' . ($Ads->adsFeatureCheck($adId, $list['Id']) === true ? ' checked="checked"' : '') . ' value="' . $list['Id'] . '" class="magic-checkbox" />
											<label>' . $list['name'] . '</label>
										</div>
									';
								}
							}
							else // view page
							{
								$Ads = new Ads($this->db);

								if($Ads->adsFeatureCheck($adId, $list['Id']) === true)
								{
									$this->groupList .= '
										<li class="form-group col-md-3 col-sm-3 col-xs-12 active">
											<i class="material-icons">check</i> <span>' . $list['name'] . '</span>
										</li>
									';
								}
								else
								{
									$notfound++;
								}
							}
						}

						if($notfound == count($featuresLists))
						{
							$this->groupList = '<div class="col-md-12">Belirtilmemiş</div>';
						}

						if($adAdd === true) // ad-add page, ad-edit page
						{
							$this->groupsHtml .= '
								<div class="row">
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="feature-title block block-content">' . $group['name'] . ' <i class="material-icons arrow-right">keyboard_arrow_up</i></label>
										<div class="features-lists">
											' . $this->groupList . '
										</div>
									</div>
								</div>
							';
						}
						else // view page
						{
							$this->groupsHtml .= '
								<div class="row">
									<ul class="form-group col-md-12 col-sm-12 col-xs-12">
										<h4>' . $group['name'] . '</h4>
										<div class="row">
											' . $this->groupList . '
										</div>
									</ul>
								</div>
							';
						}

						$this->groupList = '';
					}
				}

				return $this->groupsHtml;
			}
			else
			{
				return false;
			}
		}

		private function categoryFeaturesList($groupId)
		{
			$this->query = $this->db->from('features_groups_list')
				->where('groupId', $groupId)
				->run();

			return $this->query;
		}

		public function itemInfo($itemID)
		{
			$this->query = $this->db->from('modulitems')
				->where('Id', $itemID)
				->first();

			return $this->query;
		}

		public function featureListInfo($listId)
		{
			$this->query = $this->db->from('features_groups_list')
				->where('Id', $listId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function modulInfo($modulId)
		{
			$this->query = $this->db->from('moduls')
				->where('Id', $modulId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		private function lock()
		{
			$this->lockStatus = true;
		}

		private function unlock()
		{
			$this->lockStatus = false;
		}

	}

?>