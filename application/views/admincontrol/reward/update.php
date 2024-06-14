
<div class="content-body">
        <div class="card award-level">
            <div class="card-header bg-secondary text-white d-flex justify-content-between">
                <h5><?= __('Khen thưởng') ?></h5>
                <a id="toggle-uploader" href="<?= base_url('admincontrol/reward') ?>" class="btn btn-sm btn-light">
                    <?= __('Quay lại') ?>
                </a>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-content">
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Tên') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_minimum_earning_desc') ?>"></span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="<?= $reward['name'] ?>" placeholder="<?= __('admin.minimum_earning') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Doanh thu tối thiểu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tôi thiểu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input type="number" class="form-control" name="minimum_earning" min="0" step="0.01" value="<?= $reward['minimum_earning'] ?>" placeholder="<?= __('admin.minimum_earning') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Hoa hồng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Hoa hồng') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">%</span>
                                <input type="number" class="form-control" name="sale_comission_rate" min="0" step="0.01" value="<?= $reward['sale_comission_rate'] ?>" placeholder="<?= __('admin.sale_comission_rate') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-3"><?= __('admin.save') ?></button>
                        <button type="submit" class="btn btn-primary" data-redirect='true'><?= __('admin.save_and_close') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $("button[type='submit']").on('click',function(e){
        e.preventDefault();
        $this = $(this);
        let form = $this.parents('form');
        let url = form.attr('action');

        $.ajax({
            type:'POST',
            dataType:'json',
            data:form.serialize(),
            success:function(result){
                $("input").removeClass('error');
                $(".error-message").text('');

                if(result.validation){
                    $.each(result.validation,function(key,value){
                        $("input[name='"+key+"']").addClass('error');
                        $("input[name='"+key+"']").siblings('.error-message').text(value);
                        showPrintMessage(value, 'error');
                    }) 
                } else {
                        if (result.status) {
                          showPrintMessage(result.message, 'success');
                          let redirect = $this.data('redirect');
                          if (redirect) {
                            setTimeout(function() {
                            window.location = '<?= base_url("admincontrol/reward") ?>';
                            }, 1000);
                          }
                    } else {
                        showPrintMessage(result.message, 'error');
                    }
                }
            },
        }); 
    })

    $("select[name='jump_level']").on('change',function(){
        let value = $(this).val();
        if(value == '0'){
            $(this).siblings('label').find('.field-description').addClass('d-none');
            $(this).siblings('label').find('.field-description.default-level-description').removeClass('d-none');
        } else {
            $(this).siblings('label').find('.field-description').removeClass('d-none');
            $(this).siblings('label').find('.field-description.default-level-description').addClass('d-none');
        }
    })
</script>
