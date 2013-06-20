var editor;
$(function(){
	KindEditor.uploadImages={};
	KindEditor.uploadFiles={};
	KindEditor.smileUrl = base_url+"index.php/action/get_smiley_json";
	KindEditor.smileys=null;
	$.ajax({
		type: "POST",
		url: KindEditor.smileUrl,
		success: function(json){
			KindEditor.smileys = json.data;
		},
		dataType: 'json',
	});
	
	KindEditor.lang({
			hide : '������������',
			code2 : '�������',
			image2 : '����ͼƬ',
			'image2.remoteImage' : '����ͼƬ',
			'image2.localImage' : '�����ϴ�',
			'image2.remoteUrl' : 'ͼƬ��ַ',
			'image2.localUrl' : '�ϴ��ļ�',
			'image2.size' : 'ͼƬ��С',
			'image2.width' : '��',
			'image2.height' : '��',
			'image2.resetSize' : '���ô�С',
			'image2.defaultAlign' : 'Ĭ�Ϸ�ʽ',
			'image2.leftAlign' : '�����',
			'image2.rightAlign' : '�Ҷ���',
			'image2.imgTitle' : 'ͼƬ˵��',
			'image2.upload' : '���...',
			smiley : '�������',
			quote : '������������',
			'insertfile.localUrl' : '����',
	});
	
	
	KindEditor.ready(function(K) {
		//alert(K===KindEditor); //true
		//alert(K.VERSION);
			editor = K.create('textarea[name="content"]', {
					resizeType : 1,
					allowPreviewEmoticons : true,
					allowImageUpload : true,
					//�����������ʽ
					cssPath : [
					base_url+'js/kindeditor/plugins/code2/codeprint.css',
					base_url+'js/kindeditor/plugins/quote/quote.css',
					],
					useContextmenu:false,
					uploadJson : base_url+'index.php/action/do_upload/',   //<<�����kindeditor3.5.5\plugins\image\image.html 
					//fileManagerJson : '../../php/file_manager_json2.php',   //<<�����kindeditor3.5.5\plugins\file_manager\file_manager.html 
					allowFileManager : false,
					afterUpload : function(url,data,name) {
						//postform
						if(data.aid!=undefined){
							var postform = $("#postform");
							postform.append('<input type="hidden" name="attachments[]" value="' + data.aid + '" />');
						}
					},
					extraFileUploadParams : {
					},
					fillDescAfterUploadImage:false,
					
					items : [
					'fontname', 'fontsize', 
					'|','justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 
					'|','insertorderedlist', 'insertunorderedlist','indent', 'outdent',
					'|','wordpaste','clearhtml','quickformat','selectall','fullscreen','source',
					//'/',
					'|',
					'bold', 'italic', 'underline','strikethrough',
					'|','forecolor', 'hilitecolor',
					'|','hr', 'table','link', 'unlink',
					'|','smiley','image2','insertfile',/*'media',*/'code2','quote',
					'|','undo', 'redo','|','hide'],
					htmlTags : {
						font : ['id', 'class', 'color', 'size', 'face', '.background-color'],
						span : [
							'id', 'class', '.color', '.background-color', '.font-size', '.font-family', '.background',
							'.font-weight', '.font-style', '.text-decoration', '.vertical-align', '.line-height'
						],
						div : [
							'id', 'class', 'align', '.border', '.margin', '.padding', '.text-align', '.color',
							'.background-color', '.font-size', '.font-family', '.font-weight', '.background',
							'.font-style', '.text-decoration', '.vertical-align', '.margin-left'
						],
						table: [
							'id', 'class', 'border', 'cellspacing', 'cellpadding', 'width', 'height', 'align', 'bordercolor',
							'.padding', '.margin', '.border', 'bgcolor', '.text-align', '.color', '.background-color',
							'.font-size', '.font-family', '.font-weight', '.font-style', '.text-decoration', '.background',
							'.width', '.height', '.border-collapse'
						],
						'td,th': [
							'id', 'class', 'align', 'valign', 'width', 'height', 'colspan', 'rowspan', 'bgcolor',
							'.text-align', '.color', '.background-color', '.font-size', '.font-family', '.font-weight',
							'.font-style', '.text-decoration', '.vertical-align', '.background', '.border'
						],
						a : ['id', 'class', 'href', 'target', 'name'],
						embed : ['id', 'class', 'src', 'width', 'height', 'type', 'loop', 'autostart', 'quality', '.width', '.height', 'align', 'allowscriptaccess'],
						img : ['id', 'class', 'src', 'width', 'height', 'border', 'alt', 'title', 'align', '.width', '.height', '.border','smileid','aid'],
						'p,ol,ul,li,blockquote,h1,h2,h3,h4,h5,h6' : [
							'id', 'class', 'align', '.text-align', '.color', '.background-color', '.font-size', '.font-family', '.background',
							'.font-weight', '.font-style', '.text-decoration', '.vertical-align', '.text-indent', '.margin-left'
						],
						pre : ['id', 'class'],
						hr : ['id', 'class', '.page-break-after'],
						'br,tbody,tr,strong,b,sub,sup,em,i,u,strike,s,del' : ['id', 'class'],
						iframe : ['id', 'class', 'src', 'frameborder', 'width', 'height', '.width', '.height']
					},
					//�����ݸ�ʽ��Ϊbbcode
					afterCreate:function(){
						//this.html(bbc2html(this.html()));
					},
			});
		//�����ݸ�ʽ��Ϊbbcode
		editor.beforeGetHtml(function(html){
				return html2bbc(html);
			});
		//��bbcode��ʽ��Ϊhtml
		editor.beforeSetHtml(function(html){
				return bbc2html(html);
			});
		function html2bbc(str){
			if(str == '') {
				return '';
			}
			//����������ţ���Ϊcode
			if(KindEditor.smileys!=null){
				str = str.replace(/<img[^>]+smileId=(["']?)(\d+)(\1)[^>]*>/ig, function($0, $1, $2) {return KindEditor.smileys[$2].code;});
			}
			//�����ϴ���ͼƬ����Ϊcode
			if(KindEditor.uploadImages!=null){
				str = str.replace(/<img[^>]+aid=(["']?)(\d+)(\1)[^>]*>/ig, "[attachimg]$2[/attachimg]");
			}
			//�����ϴ��ĸ�������Ϊcode
			if(KindEditor.uploadFiles!=null){
				str = str.replace(/<a[^>]+aid=(["']?)(\d+)(\1)[^>]*>[^>]*<\/a>/ig, "[attach]$2[/attach]");
			}
			return str;
		}
		function bbc2html(str){
			//����������ţ���Ϊhtml
			var smileys = KindEditor.smileys;
			if(smileys != null) {
				for(var id in smileys) {
					var re = new RegExp(preg_quote(smileys[id].code), "g");
					str = str.replace(re, '<img src="' + smileys[id].url + '" border="0" smileId="' + id + '" />');
				}
			}
			//bbcodeͼƬ����Ϊhtml
			str = str.replace(/\[attachimg\](\d+)\[\/attachimg\]/g, function($0,$1,$2){
												if(typeof KindEditor.uploadImages[$1] == "undefined"){
													return '';
												}else{
													return KindEditor.uploadImages[$1]
												}
											});
			//bbcode��������Ϊhtml
			str = str.replace(/\[attach\](\d+)\[\/attach\]/g, function($0,$1,$2){
												if(typeof(KindEditor.uploadFiles[$1]) == "undefined"){
													return '';
												}else{
													return KindEditor.uploadFiles[$1]
												}
											});
			return str;
		}
		function preg_quote(str) {
			return (str+'').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!<>\|\:])/g, "\\$1");
		}
		function isEmptyObject(obj){
			for(var n in obj){return false} 
			return true;
		} 
		//Ԥ��
		$("#preview").click(function() {
			alert(editor);
                    var K = KindEditor,
                        html = '<div style="padding:10px 20px;">' +
                                '<iframe class="ke-textarea" frameborder="0" style="width:708px;height:400px;"></iframe>' +
                                '</div>',
                        dialog = editor.createDialog({
                                width : 750,
                                title : 'Ԥ��',
                                body : html
                        }),
                        iframe = K('iframe', dialog.div),
                        doc = K.iframeDoc(iframe);
                doc.open();
                doc.write(bbc2html(editor.fullHtml()));
                doc.close();
                K(doc.body).css('background-color', '#FFF');
                iframe[0].contentWindow.focus();
        });
		
	});
});