<body>
    <div class="modal fade" id="modal-status-js" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thay đổi trạng thái</h4>
                </div>
                <div class="modal-body">
                    <select id="approve_id" name="approve" class="form-control">
                        @foreach($status as $key => $val)
                        <option value="{{ $key }}" {{  $key ? 'selected':''}}>{{ $val }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="book_id" value="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-change-status" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>    
    </div>
</body>

