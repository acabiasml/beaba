<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">

        <style>
            @page {
                margin: 0cm 0cm;
            }

            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
        </style>
    </head>
    <body>

        <header>
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:192pt;">
                    {{public_path('assets/img/ctjj.png')}}
                    <img src="{{public_path('assets/img/ctjj.png')}}">
                </div>
                <div style="margin-left:200pt; background-color: green">
                    RIGHT COLUMN
                </div>
            </div>
        </header>

        <footer>
            Copyright &copy; <?php echo date("Y");?> 
        </footer>

        <main>
            <p style="page-break-after: always;">
                Content Page 1
            </p>
            <p style="page-break-after: always;">
                Content Page 2
            </p>
            <p style="page-break-after: never;">
                Content Page 3
            </p>
        </main>

    </body>
</html>
