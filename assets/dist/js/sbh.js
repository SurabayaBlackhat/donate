$('select').selectpicker();
$(function() {
  $('[data-toggle="popover"]').popover();
  $('.has-error').popover('show');
});
Dropzone.options.DZid = {
  paramName: 'userfile',
  maxFilesize: 1,
  acceptedFiles: '.png,.jpg,.jpeg,.gif',
  previewsContainer: '#DZpreviews',
  thumbnailWidth: 200,
  thumbnailHeight: 200,
  init: function() {
    this.on("error", function(file, message) {
      alert(message);
    });
    this.on("addedfile", function() {
      if (this.files[2]!=null){
        this.removeFile(this.files[0]);
      }
    });
  }
};