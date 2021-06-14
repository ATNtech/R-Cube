<!DOCTYPE html>
<html lang="en">
<?php $ver = '0.1' ?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/override.css?v=<?=$ver?>" />
    <link rel="stylesheet" href="/style.css?v=<?=$ver?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <title>InCube</title>

    <script id="chatBroEmbedCode">
/* Chatbro Widget Embed Code Start */
    //function ChatbroLoader(chats,async){async=!1!==async;var params={embedChatsParameters:chats instanceof Array?chats:[chats],lang:navigator.language||navigator.userLanguage,needLoadCode:'undefined'==typeof Chatbro,embedParamsVersion:localStorage.embedParamsVersion,chatbroScriptVersion:localStorage.chatbroScriptVersion},xhr=new XMLHttpRequest;xhr.withCredentials=!0,xhr.onload=function(){eval(xhr.responseText)},xhr.onerror=function(){console.error('Chatbro loading error')},xhr.open('GET','//www.chatbro.com/embed.js?'+btoa(unescape(encodeURIComponent(JSON.stringify(params)))),async),xhr.send()}
/* Chatbro Widget Embed Code End */
    //ChatbroLoader({encodedChatId: '07obu'});
</script>
</head>

<?php
$page = $this->route['action'];
?>
<script>console.log(`<?=$page?>`)</script>

<body>
    <?php if($page == 'index'): ?>
        <?php $this->getPart('inc/sidebar', compact('page')) ?>
        <div id="content" style="padding-left: 200px;    width: 100%;">
            <?= $content ?>
            <div class="overlay"></div>
        </div>
    <?php else: ?>
        <div id="content" style="width: 100%;">
            <div class="nav-top d-flex">
                <div><img src="/logo-l.svg" width="188" alt=""></div>
            </div>
            <div class="container">
                <?= $content ?>
            </div>
            <div class="nav-bottom text-right">
                <div><img src="/logo.svg" width="183" alt=""></div>
            </div>
            <div class="overlay"></div>
        </div>
    <?php endif; ?>


    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(".ms").select2({
            theme: "classic",
            language: "rus"
        })
        $(".mst").select2({
            theme: "classic",
            tags: true,
            language: "rus",
            tokenSeparators: [',']
        })

        $('#add').click(function() {
            $.get('/profile?id=' + $('#ch').val(), function(res) {
                var sel = [];
                var l = $('#nv').val().length;
                JSON.parse(res).forEach(function(val, i, arr) {
                    var id = l + i - 1;
                    var data = {
                        id: id,
                        text: val
                    };
                    // var newOption = new Option(data.text, data.id, false, false);
                    // $('#nv').append(newOption);

                    if ($('#nv').find("option[value='" + data.id + "']").length) {
                        // $('#nv').val(data.id).trigger('change');
                    } else {
                        sel.push(i)
                        var newOption = new Option(data.text, data.id, true, true);
                        $('#nv').append(newOption);
                    }
                })

                $('#nv').trigger('change');
            })
        })

        $('.md-click').click(function(e) {
            getText();
        });

        $('body').on('click', '.swal2-container textarea', function() {
            $(this).focus();
        })

        async function getText() {

            const {
                value: text
            } = await Swal.fire({
                input: 'textarea',
                showCancelButton: false,
                confirmButtonText: 'Go',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    var promise = new Promise(function(resolve, reject) {
                        setTimeout(() => resolve(login), 1000);
                    })
                    return promise;
                },
                allowOutsideClick: () => !Swal.isLoading()
            })

            if (text) {
                getText2(text)
            }
        }


        async function getText2(data) {

            const inputOptions = new Promise((resolve) => {
                setTimeout(() => {
                    resolve({
                        'vac_40295452.json': 'vac_40295452.json',
                        'vac_43154949.json': 'vac_43154949.json',
                        'vac_43696650.json': 'vac_43696650.json',
                    })
                }, 1000)
            })

            const {
                value: text
            } = await Swal.fire({
                showCancelButton: false,
                showLoaderOnConfirm: true,
                input: 'radio',
                inputOptions: inputOptions,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to choose something!'
                    }
                },
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: (json) => {
                    return $.get('/profile?id=' + json, function(res) {
                                var sel = [];
                                var l = $('#nv').val().length;
                                JSON.parse(res).forEach(function(val, i, arr) {
                                    var id = l + i - 1;
                                    var data = {
                                        id: id,
                                        text: val
                                    };
                                    // var newOption = new Option(data.text, data.id, false, false);
                                    // $('#nv').append(newOption);

                                    if ($('#nv').find("option[value='" + data.id + "']").length) {
                                        // $('#nv').val(data.id).trigger('change');
                                    } else {
                                        sel.push(i)
                                        var newOption = new Option(data.text, data.id, true, true);
                                        $('#nv').append(newOption);
                                    }
                                })

                                $('#nv').trigger('change');
                            })
                        // .then(function(response) {
                        //     if (!response.ok) {
                        //         throw new Error(response.statusText)
                        //     }
                        //     return response.json()
                        // })
                        // .catch(function(error) {
                        //     Swal.showValidationMessage(`Request failed: ${error}`)
                        // })
                },
            })

            if (text) {
                Swal.fire({
                    title: 'Успешно!',
                    html: `
						<code>${text}</code>
					`,
                    confirmButtonText: 'Lovely!'
                })
            }
        }
    </script>

    <?php foreach ($scripts as $script) {
        echo $script;
    } ?>
</body>

</html>