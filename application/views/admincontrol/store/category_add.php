<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="category-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="pull-left"><?= __('admin.edit_category') ?></h5>
                    <div class="pull-right">
                        <button id="toggle-uploader" type="submit" class="btn-submit btn btn-light">
                            <?= __('admin.save') ?>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="category_id"
                           value="<?= isset($category['id']) ? $category['id'] : '' ?>">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.category_name') ?></label>
                                <input type="text" name="name" class="form-control"
                                       value="<?= isset($category['name']) ? $category['name'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label"><?= __('admin.parent_category') ?></label>
                                <select name="parent_id" class="form-control">
                                    <option value="">-- <?= __('admin.none') ?> --</option>
                                    <?php foreach ($categories as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>" <?php echo ($category['parent_id'] == $value['id'] )?'selected':''; ?>><?= $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('Danh mục MLM') ?></label>
                                <select name="mlm_categories" class="form-control">
                                    <option value="">-- <?= __('admin.none') ?> --</option>
                                    <option value="hang-hoa" <?php echo ($category['mlm_categories'] == 'hang-hoa') ? 'selected' : ''; ?>>Hàng hoá</option>
                                    <option value="te-bao-goc" <?php echo ($category['mlm_categories'] == 'te-bao-goc') ? 'selected' : ''; ?>>Tế bào gốc</option>
                                    <option value="dich-vu" <?php echo ($category['mlm_categories'] == 'dich-vu') ? 'selected' : ''; ?>>Dịch vụ</option>
                                    <option value="dao-tao" <?php echo ($category['mlm_categories'] == 'dao-tao') ? 'selected' : ''; ?>>Đào tạo</option>
                                    <option value="nha-phan-phoi"<?php echo ($coupon['categories'] == 'nha-phan-phoi') ? 'selected' : ''; ?>>Nhà Phân Phối</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.description') ?></label>
                                <textarea data-height='300' class="form-control summernote-img"
                                          name="description"><?= isset($category['description']) ? $category['description'] : '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.heading_text_color') ?></label>
                                <input name="color" value="<?php echo $category['color']; ?>"
                                       class="form-control jscolor" data-jscolor type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.display_as_tag') ?></label>
                                <div class="radio">
                                    <label><input type="radio" name="tag" value="1"
                                                  <?php if (!isset($category['tag']) || $category['tag'] == 1){ ?>checked="checked"<?php } ?>> <?= __('admin.enable') ?>
                                    </label>
                                    <label><input type="radio" name="tag" value="0"
                                                  <?php if (isset($category['tag']) && $category['tag'] == 0){ ?>checked="checked"<?php } ?>> <?= __('admin.disable') ?>
                                    </label> &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.image') ?></label>
                                <div>
                                    <?php $category_image = $category['image'] != '' ? 'assets/images/product/upload/thumb/' . $category['image'] : 'assets/images/no_image_available.png'; ?>
                                    <img src="<?php echo base_url($category_image); ?>" id="featureImage"
                                         class="thumbnail" border="0" width="220px">
                                    <div>
                                        <div class="fileUpload btn btn-sm btn-primary">
                                            <span><?= __('admin.choose_file') ?></span>
                                            <input id="category_image" name="category_image" class="upload" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?= __('admin.background_image') ?></label>
                                <div>
                                    <?php $category_background_image = $category['background_image'] != '' ? 'assets/images/product/upload/thumb/' . $category['background_image'] : 'assets/images/no_image_available.png'; ?>
                                    <img src="<?php echo base_url($category_background_image); ?>"
                                         id="featureBackgroundImage" class="thumbnail" border="0" width="220px">
                                    <div>
                                        <div class="fileUpload btn btn-sm btn-primary">
                                            <span><?= __('admin.choose_file') ?></span>
                                            <input id="category_background_image" name="category_background_image"
                                                   class="upload" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#featureImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById("category_image").onchange = function () {
        readURL(this);
    };

    $(".btn-submit").on('click', function (evt) {
        evt.preventDefault();
        var formData = new FormData($("#category-form")[0]);
        formData = formDataFilter(formData);
        $this = $("#category-form");

        $(".btn-submit").btn("loading");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            error: function () {
                $(".btn-submit").btn("reset");
            },
            success: function (result) {
                $(".btn-submit").btn("reset");
                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger").remove();

                if (result['location']) {
                    window.location = result['location'];
                }

                if (result['errors']) {
                    $.each(result['errors'], function (i, j) {
                        $ele = $this.find('[name="' + i + '"]');
                        if ($ele) {
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='text-danger'>" + j + "</span>");
                        }
                    });
                }
            },
        })
        return false;
    });
</script>
				