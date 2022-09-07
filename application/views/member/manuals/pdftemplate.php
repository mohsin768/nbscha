<html>
    <head>
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 90px 50px 60px 50px;
            }
            @page :first {
                margin: 0px;
            }
            header {
                position: fixed;
                top: -65px;
                left: 0px;
                right: 0px;
                height: 60px;

                /** Extra personal styles **/
                color: #000000;
                text-align: center;
            }
            header h3{
                margin:0px 0px 5px 0px;
                padding:0px;
                color: #843C0B;
            }
            header h5{
                margin:0px;
                padding:0px;
            }

            footer {
                position: fixed; 
                bottom: -30px; 
                left: 0px; 
                right: 0px;
                height: 30px; 

                /** Extra personal styles **/
                color: #000000;
                text-align: center;
            }
            footer .page-number:after { content: counter(page); }
            .page-break-after { page-break-after: always; }
            .cover-table{
                width:100%;
                margin:0px;
                padding:0px;
                border:0px; 
            }
            .cover-table img{
                width:100%;
            }
        </style>
        <?php echo $customcss; ?>
    </head>
    <body>
        <div class="page-break-after">
            <table cellspacing="0" cellpadding="0" class="cover-table">
                <tr><td><img src="<?php echo $cover_header; ?>" /></td></tr>
                <tr><td><img src="<?php echo $cover_title; ?>" /></td></tr>
                <tr><td><img src="<?php echo $cover_footer; ?>" /></td></tr>
            </table>
        </div>
        <!-- Define header and footer blocks before your content -->
        <header>
            <h3><?php echo $header_title; ?></h3>
            <h5><?php echo $header_subtitle; ?></h5>
        </header>

        <footer>
            <div class="page-number"></div>
        </footer>
        <div class="page-break-after">
           <h2>Table of Contents</h2>
           <ul>
           <?php foreach($policies as $policy): ?>
            <li><a href="#policy-<?php echo $policy['id']; ?>"><?php echo $policy['title']; ?></a></li>
            <?php endforeach; ?>
           </ul>
        </div>
        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <?php $count = count($policies); $loop = 0; foreach($policies as $policy): $loop++; ?>
                <h2><a name="policy-<?php echo $policy['id']; ?>"><?php echo $policy['title']; ?></a></h2>
                <?php echo $policy['content']; ?>
                <?php if($loop<$count){ ?>
                <div class="page-break-after"></div>
                <?php } ?>
            <?php endforeach; ?>
        </main>
    </body>
</html>