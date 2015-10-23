$(function() {
	/*
	number of fieldsets
	*/
	var fieldsetCount = $('#formElem').children().length;
	
	/*
	current position of fieldset / navigation link
	*/
	var current 	= 1;
    
	/*
	sum and save the widths of each one of the fieldsets
	set the final sum as the total width of the steps element
	*/
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);
	
	/*
	to avoid problems in IE, focus the first input of the form
	*/
	$('#formElem').children(':first').find(':input:first').focus();	
	
	/*
	show the navigation bar
	*/
	$('#navigation').show();
	
	/*
	when clicking on a navigation link 
	the form slides to the corresponding fieldset
	*/
    $('#navigation a').bind('click',function(e){
		var $this	= $(this);
		var prev	= current;
		$this.closest('ul').find('li').removeClass('selected');
        $this.parent().addClass('selected');
		/*
		we store the position of the link
		in the current variable	
		*/
		current = $this.parent().index() + 1;
		/*
		animate / slide to the next or to the corresponding
		fieldset. The order of the links in the navigation
		is the order of the fieldsets.
		Also, after sliding, we trigger the focus on the first 
		input element of the new fieldset
		If we clicked on the last link (confirmation), then we validate
		all the fieldsets, otherwise we validate the previous one
		before the form slided
		*/
        $('#steps').stop().animate({
            marginLeft: '-' + widths[current-1] + 'px'
        },500,function(){
			if(current == fieldsetCount)
				validateSteps();
			else
				validateStep(prev);
			$('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first').focus();	
		});
        e.preventDefault();
    });
	
	/*
	clicking on the tab (on the last input of each fieldset), makes the form
	slide to the next step
	*/
	$('#formElem > fieldset').each(function(){
		var $fieldset = $(this);
		$fieldset.children(':last').find(':input').keydown(function(e){
			if (e.which == 9){
				$('#navigation li:nth-child(' + (parseInt(current)+1) + ') a').click();
				/* force the blur for validation */
				$(this).blur();
				e.preventDefault();
			}
		});
	});
	
	/*
	validates errors on all the fieldsets
	records if the Form has errors in $('#formElem').data()
	*/
	function validateSteps(){
		var FormErrors = false;
		for(var i = 1; i < fieldsetCount; ++i){
			var error = validateStep(i);
			if(error == -1)
				FormErrors = true;
		}
		$('#formElem').data('errors',FormErrors);	
	}
	
	/*
	validates one fieldset
	and returns -1 if errors found, or 1 if not
	*/
	function validateStep(step){
		if(step == fieldsetCount) return;
		
		var error = 1;
		var hasError = false;
		
		$('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			var $this 		= $(this);
			var valueLength = jQuery.trim($this.val()).length;
			var valuecamp = jQuery.trim($this.val());
			var validacion = false;
			var valuepat_pre = $(this).attr('name');
			var myarr = valuepat_pre.split("[");
			var valuepat = myarr[0];
			
			if(valuepat=='cedula' || valuepat=='telefono' || valuepat=='anos' || valuepat=='cedula_RP' || valuepat=='cedula_RP1' || valuepat=='cedula_RP2' || valuepat=='cedula_fam' || valuepat=='edad_fam')
			{ 
				
				if(valuepat=='cedula' || valuepat=='anos' || valuepat=='cedula_RP' || valuepat=='cedula_RP1' || valuepat=='cedula_RP2' || valuepat=='cedula_fam' || valuepat=='edad_fam') var patron = /^\d+$/;
				if(valuepat=='telefono') var patron = /^\d{4}\-\d{7}$/;
					if (!patron.test(valuecamp))
					{
						validacion=true;
					} 		
			}

			/*function valida_radio(){
				var opciones1 = document.getElementsByName("part_nac");
				var opciones2 = document.getElementsByName("ins_milt");
				var opciones3 = document.getElementsByName("ced_iden");
				var opciones4 = document.getElementsByName("rif");
				var opciones5 = document.getElementsByName("dec_jur");
				var opciones6 = document.getElementsByName("inf_med");
				var opciones7 = document.getElementsByName("part_nac_h");
				var opciones8 = document.getElementsByName("matr_divr");
				var opciones9 = document.getElementsByName("defunc");
				var opciones10 = document.getElementsByName("titul");
				var opciones11 = document.getElementsByName("certf");
				var opciones12 = document.getElementsByName("const_hora");

				
				var radio1 = false;
				var radio2 = false;
				var radio3 = false;
				var radio4 = false;
				var radio5 = false;
				var radio6 = false;
				var radio7 = false;
				var radio8 = false;
				var radio9 = false;
				var radio10 = false;
				var radio11 = false;
				var radio12 = false;

				for(i=0; i<2; i++){
					if(opciones1[i].checked){
						radio1 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones2[i].checked){
						radio2 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones3[i].checked){
						radio3 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones4[i].checked){
						radio4 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones5[i].checked){
						radio5 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones6[i].checked){
						radio6 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones7[i].checked){
						radio7 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones8[i].checked){
						radio8 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones9[i].checked){
						radio9 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones10[i].checked){
						radio10 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones11[i].checked){
						radio11 = true;
						break;
					}
				}
				for(i=0; i<2; i++){
					if(opciones12[i].checked){
						radio12 = true;
						break;
					}
				}
				if(!radio1 || !radio2 || !radio3 || !radio4 || !radio5 || !radio6 || !radio7 || !radio8 || !radio9 || !radio10 || !radio11 || !radio12){
					
					return false;
				}else{
					return true;
				}
			}
			valida_radio();
			alert(valida_radio());	*/	
			if(valueLength == '' || validacion){
				hasError = true;
				$this.css('background-color','#FFEDEF');
			}
			else
				$this.css('background-color','#FFFFFF');	
		});
		var $link = $('#navigation li:nth-child(' + parseInt(step) + ') a');
		$link.parent().find('.error,.checked').remove();
		
		var valclass = 'checked';
		if(hasError){
			error = -1;
			valclass = 'error';
		}
		$('<span class="'+valclass+'"></span>').insertAfter($link);
		
		return error;
	}
	
	/*
	if there are errors don't allow the user to submit
	*/
	$('#registerButton').bind('click',function(){
		if($('#formElem').data('errors')){
			$('#errordesact').slideUp();
			$('#errordesact').slideDown();
			return false;
		}	
	});
});