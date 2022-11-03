<div class="row" style="margin-top: 90px;padding-bottom:200px">
    <?php 
        include './View/menu.php';
    ?>

    <div class="col-lg-10 " style="position: relative;left: 140px;">
        <div class="row">
            <div class="col-lg-9 mr-5 pr-5 pb-5 mt-3" style="border-right: 1px solid #ece5e5;">
                <form action="index.php?action=blog&act=themblog_action" class="frm_blog" id="frm_blog" method="post" onsubmit="smit()">
                    <input type="number" name="sochitiet" hidden>
                    <input type="text" name="title" class="mb-2" style="width:100%;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;font-size: 40px;border: none;font-weight: bold;" placeholder="Add title" required>
                    <textarea name="1"  rows="4" style="width:100%;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;font-size: 20px;border: none;" placeholder="Type / to choose a block" class="mt-2" required></textarea>
                </form>
                <button type="button" class="btn btn-outline-success w-100" onclick="add()"><i class="fas fa-plus"></i></button>

            </div>
            <div class="col-lg-2 pt-4" style="position: fixed;right: 100px;">
                <img src="./Public/img/imgnull.jpg" id="hinhdaihien" class="w-100 mb-3" alt="" style="border-radius:10px">
                <input type="file" name="file" id="file" onchange="hinhanh()" class="inputfile" form="frm_blog"/>
                <label class="p-2 w-100 text-center" for="file" style="border-radius:10px"><i class="fas fa-upload"></i> Chọn hình đại diện</label>
                <button type="submit" form="frm_blog" class="btn btn-warning mt-4 w-100 p-2">ĐĂNG BLOG</button>
            </div>
        </div>
    </div>
</div>
<script>
    var i = 1
    function add(){
        i++
        var  frm = document.getElementsByClassName('frm_blog')[0];
        frm.sochitiet.value=i;
        var node = document.createElement('textarea')
        node.setAttribute('rows',4)
        node.setAttribute('name',i)
        node.setAttribute('style','width:100%;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;font-size: 20px;border: none;')
        node.setAttribute('placeholder','Type / to choose a block')
        frm.append(node)
    }
    function smit(){
        var  frm = document.getElementsByClassName('frm_blog')[0];
        frm.sochitiet.value=i;

    }
    function hinhanh(){
        var  file = document.getElementById('file');
        document.getElementById('hinhdaihien').attributes[0].value = './Public/img/'+file.files[0].name;
        
    }

</script>