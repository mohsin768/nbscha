<html>
    <head>
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 80px 50px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                color: #000000;
                text-align: center;
                line-height: 25px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 30px; 

                /** Extra personal styles **/
                color: #000000;
                text-align: center;
                line-height: 25px;
            }
            footer .page-number:after { content: counter(page); }
            .page-break-after { page-break-after: always; }
        </style>
        <?php echo $customcss; ?>
    </head>
    <body>
        <div class="page-break-after">
           Cover Page
        </div>
        <!-- Define header and footer blocks before your content -->
        <header>
            Your Organization
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