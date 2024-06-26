<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no"/>
    <title>Комментарии</title>
    <link href="/css/bootstrap-grid.min.css" rel="stylesheet"/>
    <link href="/css/ccs_v3.css" rel="stylesheet"/>
    <link href="/css/jquery-ui.structure.min.css" rel="stylesheet"/>
    <link href="/css/jquery-ui.theme.min.css" rel="stylesheet"/>
</head>

<body>
<div id="main">
    <!--HEADER-->
    <header id="header">
    </header>

    <!--CONTENT-->
    <main class="content">
        <div class="top-bg">
        </div>
        <div class="content-box">
            <div class="row">
                <div class="col-12">
                    <h2>Комментарии</h2>
                </div>
            </div>
            <div class="tabs-list mt-5">
                <div class="tab-content mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="responsive-table mb-lg-0">
                                <table class="table-styled  table-system orders-list mt-3">
                                    <tbody>
                                    <tr>
                                        <th class="col-2">Дата</th>
                                        <th class="col-2">Имя</th>
                                        <th>Текст комментария</th>
                                    </tr>
                                    <tr class="prototype">
                                        <td>
                                                            <span class="table-date">

                                                            </span>
                                        </td>
                                        <td class="table-name">

                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                                            <span class="table-text">

                                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content-box">
            <div class="row pr-lg-0 pl-lg-0 pr-md-0 pl-md-0 pagination-mpadding d-pagination-mob">
                <div class="col-lg-4 col-12 d-flex align-items-center"><span class="pagination-status"></span></div>
                <div class="col d-flex justify-content-lg-end mt-sm-0 mb-lg-0 mb-4 mt-2">
                    <ul class="paging"></ul>
                </div>
            </div>
        </div>


        <div class="content-box">
            <div class="row">
                <div class="col-lg-5">
                    <h3>Добавить комментарий</h3>
                </div>
            </div>
            <form class="cmxform" id="commentForm" method="get" action="">
            <section class="mb-4" >
                <div class="color-box">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="mt-2">Имя:</label>
                        </div>
                        <div class="col-md-10">
                            <input id = "comment_name" name ="name" type="text" class="tx" tab-index="1" placeholder="Имя...">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <label class="mt-2">Текст вопроса:</label>
                        </div>
                        <div class="col-md-10">
                            <textarea class="popup-textarea comment-textarea" rows="5"
                                      placeholder="Текст комментария..."
                                      id = "comment_text"
                                      name ="text"
                                      style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 127px;"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label class="mt-2">Дата:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text"
                                   id = "comment_date"
                                   class="tx"
                                   placeholder="Дата"
                                   name ="date"
                            >
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-5"></div>
                        <div class="col-md-3 pr-md-0">
                            <a href="#" id = "clearCommentForm" class="btn btn-border btn-red w-100">Очистить</a>
                        </div>
                        <div class="col-md-4 mt-md-0 mt-4">
                            <a href="#" id = "submitCommentForm" class="btn w-100">Разместить</a>
                        </div>
                    </div>
                </div>
            </section>
            </form>
        </div>

    </main>
    <!--FOOTER-->
    <footer id="footer">
        <div class="footer-box">
            <div class="footer-data row">
                <div class="col-md-auto">
                    <div class="copy">
                        &copy; La-La-LA, 2024
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/datepicker-ru.js"></script>



</body>
</html>