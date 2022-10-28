 <div class="modal fade bs-example-modal-xl tampilModal" tabindex="1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul_form"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formKu">
                 @csrf
                 <input type="hidden" name="id" id="id_form">
                 <input type="hidden" name="jenis_transaksi" id="jenis_transaksi" value="{{ $jenis }}">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <label for="persembahan_id">Persembahan</label>
                             <div class="mb-1">
                                 <select name="persembahan_id" id="persembahan_id" class="select-basic form-select"
                                     required>

                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="col-12">
                         <label for="tgl_transaksi">Tgl. Transaksi</label>
                         <div class="mb-1">
                             <input class="form-control inputReset" type="date" id="tgl_transaksi"
                                 name="tgl_transaksi">
                         </div>
                     </div>
                     <div class="col-12">
                         <label for="uraian">Uraian</label>
                         <div class="mb-1">
                             <input class="form-control inputReset" type="text" id="uraian" name="uraian">
                         </div>
                     </div>
                     <div class="col-12">
                         <label for="jumlah">Jumlah</label>
                         <div class="mb-1">
                             <input class="form-control inputReset" type="text" id="jumlah" data-type="currency"
                                 name="jumlah" autocomplete="off">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary" id="tombolForm">Save changes</button>
                 </div>
             </form>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
