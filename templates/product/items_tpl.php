<link rel="stylesheet" type="text/css" href="js/DataTables/css/dataTables.bootstrap.css">
<script type="text/javascript" charset="utf8" src="js/DataTables/datatables.js"></script>
<script type="text/javascript" charset="utf8" src="js/DataTables/js/dataTables.bootstrap.js"></script>
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>NGÀY ĐĂNG</th>
                    <th>TIÊU ĐỀ</th>
                    <th>TRẠNG THÁI</th>
                    <th>THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tindangs as $key => $value) {
                ?>
                <tr>
                    <td><?= date('d/m/Y',$value["ngaytao"]) ?></td>
                    <td><?= $value["ten"] ?></td>
                    <td><?= ($value["hienthi"]>0)?'Đã duyệt':'Chưa duyệt' ?></td>
                    <td><a href="sua-tin/sua-tin-dang-<?= $value["id"] ?>.html" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i> Sửa</a></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>NGÀY ĐĂNG</th>
                    <th>TIÊU ĐỀ</th>
                    <th>TRẠNG THÁI</th>
                    <th>THAO TÁC</th>
                </tr>
            </tfoot>
        </table>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            "language": {
                        "lengthMenu": "Hiện _MENU_ tin / trang",
                        "zeroRecords": "Chưa có dữ liệu",
                        "search":         "Tìm kiếm:",
                        "info": "Trang _PAGE_ / _PAGES_",
                        "paginate": {
                                "first":      "Đầu",
                                "last":       "Cuối",
                                "next":       "Sau",
                                "previous":   "Trước"
                            },
                        "infoEmpty": "Chưa có dữ liệu",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    }
        });
    } );
</script>