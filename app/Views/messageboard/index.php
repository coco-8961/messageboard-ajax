<!DOCTYPE html>
<html lang>
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="message.js"></script>
    <link rel="stylesheet" type="text/css" href="message.css">

</head>
<body>
    <h1 style="text-align: justify;text-align-last: justify; text-justify: distribute-all-lines;width: 500px;margin: 15px auto;">留言板</h1>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addModalCenter" style="margin:2px auto;letter-spacing: 30px;" >我要留言</button>
    <!-- 新增的彈跳視窗 -->
    <div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin: 0 auto;width: auto;">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalCenterTitle">新增留言</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="#">
                  <p>暱稱：</p>
                  <input id="add_name" type="text" name="name" required>
                  <p>留言內容：</p>
                  <textarea id="add_content" name="content" cols="23" rows="5" style="resize: both;" required></textarea>
              </form> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">離開</button>
            <button type="button" type="submit" class="btn btn-primary" id="addmsg" data-dismiss="modal">送出</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 編輯的彈跳視窗 -->
    <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin: 0 auto;width: auto;">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalCenterTitle">變更留言</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="#">
                 <input id="edit_id" type="hidden" name="id" value="">
                  <p>暱稱：</p>
                  <input id="edit_name" type="text" name="name" value="" required>
                  <p>留言內容：</p>
                  <textarea id="edit_content" name="content" cols="23" rows="5" style="resize: both;" required></textarea>
              </form> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">再想想</button>
            <button type="button" class="btn btn-primary" id="editmsg" data-dismiss="modal">確定修改</button>
          </div>
        </div>
      </div>
    </div>
    
    <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th id="name">姓名</th>
            <th id="content">留言訊息</th>
            <th id="time">留言時間</th>
            <th id="edit_">編輯&刪除</th>
          </tr>
        </thead>
        <tbody id="allmessage">
        </tbody>
      </table>
</body>

</html>