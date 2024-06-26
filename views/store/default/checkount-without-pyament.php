<div class="payment-button-group">
	<button type="button" class="btn btn-default" onclick='backCheckout()'>Back</button>
	<button id="button-confirm" class="btn btn-primary">Confirm</button>
	<input type="hidden" name="comment[1][payment_mode]" value="<?php echo $payment_mode; ?>">
</div>
<script type="text/javascript">
	$("#button-confirm").click(function(){
		$this = $(this);

		$this.prop('disabled',true);
		
		$.ajax({
			url:'<?= $payment_confirmation?>',
			type:'POST',
			dataType:'json',
			data:$('[name^="comment"]').serialize(),
			beforeSend:function(){$("#button-confirm").btn("loading");},
			complete:function(){$("#button-confirm").btn("reset");},
			success:function(json)
			{
				$container = $("#checkout-confirm");
				$container.find(".has-error").removeClass("has-error");
				$container.find("span.text-danger").remove();

				if(json['errors']){
					$.each(json['errors']['comment'], function(ii,jj){
					    $ele = $container.find('#comment_textarea'+ ii);
					    if($ele){
					        $ele.parents(".form-group").addClass("has-error");
					        $ele.after("<span class='text-danger'>"+ jj +"</span>");
					    }
					});
				}

				if(json['success'])
				{
					$.ajax({
						url:'<?= $confirm_payment?>',
						type:'POST',
						dataType:'json',
						data:{
							payment_gateway: "no_payment"
						},
						beforeSend:function(){
							$this.btn("loading");
						},
						complete:function(){
							$this.btn("reset");
						},
						success:function(json){
							if(json['redirect']){
								window.location = json['redirect'];
							}
							if(json['warning']){
								alert(json['warning'])
							}
						},
					});
				}
			},
		});
	});
</script>
