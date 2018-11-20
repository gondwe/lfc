
<!-- direct entry modal -->
<!-- ==================================== -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <?php $this->load->view('enqueue', ["id"=>$p->id])?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>

<script>


$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  
  var thisdate =  button.data('date')
  var drlist =  button.data('doc');
  let dx = button.data('dx')

  var modal = $(this);
  modal.find('.modal-title').text('Book Patient on ' + dx);
  modal.find('.modal-body [name=bkdate]').val(thisdate);
});



$("form").submit(function(e){
    e.preventDefault(e);
    url =$(this).attr("action");
    $.ajax({
        type : "POST",
        url: url,
        data : $("form").serialize(),
        success : function(res){
            $("#exampleModal").modal("hide");
        }
    }).done(function(){
        window.location.reload();
    });

});



</script>