<?php 
	$custom_css = get_option('custom_css');
	$custom_js = get_option('custom_js');

	if( isset($_POST['custom_css']) && $_POST['custom_js'] ) {


		$custom_css = $_POST['custom_css'];
		$custom_js = $_POST['custom_js'];

        $custom_css = str_replace("\'","'",$custom_css);
        $custom_css = str_replace('\"','"',$custom_css);
        $custom_css = str_replace('\\','%5C',$custom_css);

        $custom_js = str_replace("\'","'",$custom_js);
        $custom_js = str_replace('\"','"',$custom_js);
        $custom_js = str_replace('\\\\','\\',$custom_js);

        update_option( 'custom_css', $custom_css );
        update_option( 'custom_js', $custom_js );

    }

    function ifExistsThen($var){
    	if(isset($var)){echo $var;}
    }


 ?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
    	input.wccj-submit {
    	padding: 10px 30px;
    	font-size: 16px;
    	border: none;
    	background-color: #3498db;
    	color: white;
    	border-radius: 3px;
    	cursor: pointer;
		}
		textarea.form-inner-input {
    		display: none;
		}
		#wccj_form{
			margin-top: 20px;
			clear: both;
		}
		
	
	.editors{
		margin-top: 20px;
		width: 100%;
    	clear: both;
    	display: inline-block;
    }

	.single-editor{
		position: relative;
		float: left;
		display: inline;
		width: 50%;
	}
	
    .editors label{
    	font-size: 13px;
    	padding:10px 20px;
    	background: #2F3129;
    	color: whitesmoke;
    	border-top-left-radius: 10px;
    	border-top-right-radius: 10px;
    }
	#cssEditor, #jsEditor {
		margin-top: 9px;
        height: 520px;
        width: 98%;
        font-size: 16px;
        border-bottom-left-radius: 10px;
    	border-bottom-right-radius: 10px;
    }

    </style>
</head>

<body>
    <h2>Frontier</h2>
    <div class="editors">
		<div class="single-editor">
			<label for="">Custom CSS</label>
			<div id="cssEditor"></div>
		</div>
		<div class="single-editor">
			<label for="">Custom JavaScript</label>
			<div id="jsEditor"></div> 
		</div>
	</div> 
    <form id="wccj_form" action="" method="post">
        <div class="form-inner-row">
            
            <textarea class="form-inner-input cust_css" name="custom_css"><?php ifExistsThen($custom_css); ?></textarea>
        </div>
        <div class="form-inner-row">
            
            <textarea class="form-inner-input cust_js" name="custom_js"><?php ifExistsThen($custom_js); ?></textarea>
        </div>
        <div class="form-inner-row">
            <input type="submit" class="wccj-submit" value="Save" />
        </div>
    </form>

 
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.2.2/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.2.2/mode-css.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.2.2/mode-javascript.js"></script>
<script>
    var cssEditor = ace.edit("cssEditor");
    cssEditor.setTheme("ace/theme/monokai");
    cssEditor.getSession().setMode("ace/mode/css");
    var jsEditor = ace.edit("jsEditor");
    jsEditor.setTheme("ace/theme/monokai");
    jsEditor.getSession().setMode("ace/mode/javascript");
	

	cssEditor.setValue(jQuery('#wccj_form .cust_css').val());
	jsEditor.setValue(jQuery('#wccj_form .cust_js').val());


	jQuery( ".wccj-submit" ).click(function(e) {
		e.preventDefault();
		jQuery('#wccj_form .cust_css').val(cssEditor.getValue());
		jQuery('#wccj_form .cust_js').val(jsEditor.getValue());
	 	jQuery( "#wccj_form" ).submit();
	});


</script>
</body>


</html>
