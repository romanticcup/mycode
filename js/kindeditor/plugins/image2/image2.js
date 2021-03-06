/*******************************************************************************
* KindEditor - WYSIWYG HTML Editor for Internet
* Copyright (C) 2006-2011 kindsoft.net
*
* @author Roddy <luolonghao@gmail.com>
* @site http://www.kindsoft.net/
* @licence http://www.kindsoft.net/license.php
*******************************************************************************/

KindEditor.plugin('image2', function(K) {
	var self = this, name = 'image2',
		allowImageUpload = K.undef(self.allowImageUpload, true),
		allowImageRemote = K.undef(self.allowImageRemote, true),
		formatUploadUrl = K.undef(self.formatUploadUrl, true),
		allowFileManager = K.undef(self.allowFileManager, false),
                
		uploadJson = K.undef(self.uploadJson, self.basePath + 'php/upload_json.php'),
		imageTabIndex = K.undef(self.imageTabIndex, 0),
		imgPath = self.pluginsPath + 'image2/images/',
		extraParams = K.undef(self.extraFileUploadParams, {}),
		filePostName = K.undef(self.filePostName, 'imgFile'),
		fillDescAfterUploadImage = K.undef(self.fillDescAfterUploadImage, false),
		lang = self.lang(name + '.'),
                insertimage = function(url, title, width, height, border, aid) {
                        title = K.undef(title, '');
                        border = K.undef(border, 0);
                        var html = '<img src="' + K.escape(url) + '" data-ke-src="' + K.escape(url) + '" ';
                        if (width) {
                                html += 'width="' + K.escape(width) + '" ';
                        }
                        if (height) {
                                html += 'height="' + K.escape(height) + '" ';
                        }
                        if (title) {
                                html += 'title="' + K.escape(title) + '" ';
                        }
                        if (aid) {
                                html += 'aid="' + aid + '" ';
                        }
                        html += 'alt="' + K.escape(title) + '" ';
                        html += '/>';
                        return html;
                };
                
	self.plugin.image2Dialog = function(options) {
		var imageUrl = options.imageUrl,
                    imageWidth = K.undef(options.imageWidth, ''),
                    imageHeight = K.undef(options.imageHeight, ''),
                    imageTitle = K.undef(options.imageTitle, ''),
                    showRemote = K.undef(options.showRemote, true),
                    showLocal = K.undef(options.showLocal, true),
                    tabIndex = K.undef(options.tabIndex, 0),
                    clickFn = options.clickFn;
		var target = 'kindeditor_upload_iframe_' + new Date().getTime();
		var hiddenElements = [];
		for(var k in extraParams){
			hiddenElements.push('<input type="hidden" name="' + k + '" value="' + extraParams[k] + '" />');
		}
		var html = [
			'<div style="padding:20px;">',
			//tabs
			'<div class="tabs"></div>',
			
			//remote image - start
			'<div class="tab2" style="display:none;">',
                            //url
                            '<div class="ke-dialog-row">',
                            '<label for="remoteUrl" style="width:60px;">' + lang.remoteUrl + '</label>',
                            '<input type="text" id="remoteUrl" class="ke-input-text" name="url" value="" style="width:200px;" /> &nbsp;',
                            '<input type="hidden" id="aid" name="aid" value="" style="width:200px;" /> &nbsp;',
                            '</div>',
                            //size
                            '<div class="ke-dialog-row">',
                            '<label for="remoteWidth" style="width:60px;">' + lang.size + '</label>',
                            lang.width + ' <input type="text" id="remoteWidth" class="ke-input-text ke-input-number" name="width" value="" maxlength="4" /> ',
                            lang.height + ' <input type="text" class="ke-input-text ke-input-number" name="height" value="" maxlength="4" /> ',
                            '<img class="ke-refresh-btn" src="' + imgPath + 'refresh.png" width="16" height="16" alt="" style="cursor:pointer;" title="' + lang.resetSize + '" />',
                            '</div>',
                            //title
                            '<div class="ke-dialog-row">',
                            '<label for="remoteTitle" style="width:60px;">' + lang.imgTitle + '</label>',
                            '<input type="text" id="remoteTitle" class="ke-input-text" name="title" value="" style="width:200px;" />',
                            '</div>',
			'</div>',
			//remote image - end
			
			//local upload - start
			'<div class="tab1" style="display:none;">',
                            '<iframe name="' + target + '" style="display:none;"></iframe>',
                            '<form class="ke-upload-area ke-form" method="post" enctype="multipart/form-data" target="' + target + '" action="' + K.addParam(uploadJson, 'dir=image') + '">',
                            //file
                            '<div class="ke-dialog-row">',
                            hiddenElements.join(''),
                            '<label style="width:60px;">' + lang.localUrl + '</label>',
                            '<input type="text" name="localUrl" class="ke-input-text" tabindex="-1" style="width:200px;" readonly="true" /> &nbsp;',
                            '<input type="button" class="ke-upload-button" value="' + lang.upload + '" />',
                            '</div>',
                            //title
                            '<div class="ke-dialog-row">',
                            '<label for="remoteTitle" style="width:60px;">' + lang.imgTitle + '</label>',
                            '<input type="text" id="localTitle" class="ke-input-text" name="title" value="" style="width:200px;" />',
                            '</div>',
                            '</div>',
                            '</form>',
			'</div>',
			//local upload - end
                        
			'</div>'
		].join('');
		var dialogWidth = showLocal ? 400 : 350,
			dialogHeight = showLocal && showRemote ? 250 : 200;
		var dialog = self.createDialog({
			name : name,
			width : dialogWidth,
			height : dialogHeight,
			title : self.lang(name),
			body : html,
			yesBtn : {
				name : self.lang('yes'),
				click : function(e) {
					if (dialog.isLoading) {
						return;
					}
					// insert local image
					if (showLocal && showRemote && tabs && tabs.selectedIndex === 0 || !showRemote) {
						if (uploadbutton.fileBox.val() == '') {
							alert(self.lang('pleaseSelectFile'));
							return;
						}
						dialog.showLoading(self.lang('uploadLoading'));
						uploadbutton.submit();
						localUrlBox.val('');
						return;
					}else{
                                            // insert remote image
                                            var url = K.trim(urlBox.val()),
                                                    width = widthBox.val(),
                                                    height = heightBox.val(),
                                                    title = titleBox.val(),
                                                    aid = aidBox.val();
                                            if (url == 'http://' || K.invalidUrl(url)) {
                                                    alert(self.lang('invalidUrl'));
                                                    urlBox[0].focus();
                                                    return;
                                            }
                                            if (!/^\d*$/.test(width)) {
                                                    alert(self.lang('invalidWidth'));
                                                    widthBox[0].focus();
                                                    return;
                                            }
                                            if (!/^\d*$/.test(height)) {
                                                    alert(self.lang('invalidHeight'));
                                                    heightBox[0].focus();
                                                    return;
                                            }
                                            clickFn.call(self, url, title, width, height, 0,aid);
                                        }
				}
			},
			beforeRemove : function() {
				widthBox.unbind();
				heightBox.unbind();
				refreshBtn.unbind();
			}
		}),
                
		div = dialog.div;
		var urlBox = K('[name="url"]', div),
                    localUrlBox = K('[name="localUrl"]', div),
                    widthBox = K('.tab1 [name="width"]', div),
                    heightBox = K('.tab1 [name="height"]', div),
                    refreshBtn = K('.ke-refresh-btn', div),
                    titleBox = K('.tab1 [name="title"]', div),
                    aidBox = K('.tab1 [name="aid"]', div);
                    
		var tabs;
		if (showRemote && showLocal) {
			tabs = K.tabs({
				src : K('.tabs', div),
				afterSelect : function(i) {}
			});
                        tabs.add({
				title : lang.localImage,
				panel : K('.tab1', div)
			});
			tabs.add({
				title : lang.remoteImage,
				panel : K('.tab2', div)
			});
			tabs.select(0);
		} else if (showLocal) {
			K('.tab1', div).show();
		} else if (showRemote) {
			K('.tab2', div).show();
		}

		var uploadbutton = K.uploadbutton({
			button : K('.ke-upload-button', div)[0],
			fieldName : filePostName,
			form : K('.ke-form', div),
			target : target,
			width: 60,
			afterUpload : function(data) {
				dialog.hideLoading();
				if (data.error === 0) {
					var url = data.url;
					if (formatUploadUrl) {
						url = K.formatUrl(url, 'absolute');
					}
					if (self.afterUpload) {
						self.afterUpload.call(self, url, data, name);
					}
					if (!fillDescAfterUploadImage) {
                                                var html = insertimage(url, data.title, data.width, data.height, data.border,data.aid);
                                                K.uploadImages[data.aid]=html;
						clickFn.call(self, url, data.title, data.width, data.height, data.border,data.aid);
					} else {
						K(".ke-dialog-row #remoteUrl", div).val(url);
                                                K(".ke-dialog-row #aid", div).val(data.aid);
						K(".ke-tabs-li", div)[1].click();
						K(".ke-refresh-btn", div).click();
					}
				} else {
					alert(data.message);
				}
			},
			afterError : function(html) {
				dialog.hideLoading();
				self.errorDialog(html);
			}
		});
		uploadbutton.fileBox.change(function(e) {
			localUrlBox.val(uploadbutton.fileBox.val());
		});
		var originalWidth = 0, originalHeight = 0;
		function setSize(width, height) {
			widthBox.val(width);
			heightBox.val(height);
			originalWidth = width;
			originalHeight = height;
		}
		refreshBtn.click(function(e) {
			var tempImg = K('<img src="' + urlBox.val() + '" />', document).css({
				position : 'absolute',
				visibility : 'hidden',
				top : 0,
				left : '-1000px'
			});
			tempImg.bind('load', function() {
				setSize(tempImg.width(), tempImg.height());
				tempImg.remove();
			});
			K(document.body).append(tempImg);
		});
		widthBox.change(function(e) {
			if (originalWidth > 0) {
				heightBox.val(Math.round(originalHeight / originalWidth * parseInt(this.value, 10)));
			}
		});
		heightBox.change(function(e) {
			if (originalHeight > 0) {
				widthBox.val(Math.round(originalWidth / originalHeight * parseInt(this.value, 10)));
			}
		});
		urlBox.val(options.imageUrl);
		setSize(options.imageWidth, options.imageHeight);
		titleBox.val(options.imageTitle);
		if (showRemote && tabIndex === 1) {
			urlBox[0].focus();
			urlBox[0].select();
		}
		return dialog;
	};
	self.plugin.image2 = {
		edit : function() {
			var img = self.plugin.getSelectedImage();
			self.plugin.image2Dialog({
				imageUrl : img ? img.attr('data-ke-src') : 'http://',
				imageWidth : img ? img.width() : '',
				imageHeight : img ? img.height() : '',
				imageTitle : img ? img.attr('title') : '',
				showRemote : allowImageRemote,
				showLocal : allowImageUpload,
				tabIndex: img ? 1 : imageTabIndex,
				clickFn : function(url, title, width, height, border, aid) {
					//self.exec('insertimage', url, title, width, height, border, align);
					self.insertHtml(insertimage(url, title, width, height, border,aid));
					// Bugfix: [Firefox] 上传图片后，总是出现正在加载的样式，需要延迟执行hideDialog
					setTimeout(function() {
						self.hideDialog().focus();
					}, 0);
				}
			});
		},
		'delete' : function() {
			var target = self.plugin.getSelectedImage();
			if (target.parent().name == 'a') {
				target = target.parent();
			}
			target.remove();
			// [IE] 删除图片后立即点击图片按钮出错
			self.addBookmark();
		}
	};
	self.clickToolbar(name, self.plugin.image2.edit);
});
