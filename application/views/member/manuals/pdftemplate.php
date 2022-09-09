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
            .policy-table{
                width:100%;
                border:1px solid #000000;
            }
            .policy-table td{
                padding: 5px;
                border:1px solid #000000;
                font-weight:bold;
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
           <?php $sectionCount = 0; foreach($sections as $section): if($section['numbered']=='1'){ $sectionCount++; }?>
            <li><a href="#section-<?php echo $section['id']; ?>">
            <?php if( $section['numbered']=='1'){ ?>
                Section <?php echo $sectionCount; ?>: 
            <?php } ?>
            <?php echo $section['title']; ?>
            </a></li>
            <?php endforeach; ?>
           </ul>
           <h3>Each section contains the following categories:</h3>
           <ul>
            <?php foreach($sectionCategories as $sectionCategory): ?>
            <li><?php echo $sectionCategory['title']; ?></li>
            <?php endforeach; ?>
           </ul>
        </div>
        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <?php $sectionCount = 0; $count = count($sections); $loop = 0; foreach($sections as $section): $loop++; if($section['numbered']=='1'){ $sectionCount++; }?>
                <h2><a name="section-<?php echo $section['id']; ?>">
                <?php if( $section['numbered']=='1'){ ?>
                    Section <?php echo $sectionCount; ?>: 
                <?php } ?>
                <?php echo $section['title']; ?>
                </a></h2>
                <?php if($section['section_type']=='categorized'){ ?>
                    <?php foreach($section['categories'] as $sectionCategory): $showCategory = false; if(count($sectionCategory['contents'])>0 || count($sectionCategory['policies'])>0){$showCategory = true; }?>
                    <?php if($showCategory){ ?>
                    <h4><?php echo $sectionCategory['title']; ?></h4>
                    <?php } ?>
                    <?php if($sectionCategory['category_type']=='policylist'){ ?>
                        <ul>
                        <?php $policyCount = 0; foreach($sectionCategory['policies'] as $sectionCategoryPolicy): $policyCount++; ?>
                        <li>
                        <a href="#section-category-policy-<?php echo $sectionCategoryPolicy['id']; ?>">
                        <?php echo $policyCount; ?>. <?php echo $sectionCategoryPolicy['title']; ?>
                        </a>
                        </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php } ?>
                    <?php if($sectionCategory['category_type']=='contentlist'){ ?>
                        <ul>
                        <?php foreach($sectionCategory['contents'] as $sectionCategoryContent):?>
                        <li>
                        <a href="#section-category-content-<?php echo $sectionCategoryContent['id']; ?>">
                        <?php echo $sectionCategoryContent['title']; ?>
                        </a>
                        </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php } ?>
                    <?php if($sectionCategory['category_type']=='contents'){ ?>
                        <?php foreach($sectionCategory['contents'] as $sectionCategoryContent):?>
                        <h3><?php echo $sectionCategoryContent['title']; ?></h3>
                        <?php echo $sectionCategoryContent['content']; ?>
                        <?php endforeach; ?>
                    <?php } ?>
                    <?php endforeach; ?>
                <?php } ?>    
                <?php if($section['section_type']=='contentlist'){ ?>
                    <?php foreach($section['contents'] as $sectionContent):?>
                    <h3>
                        <a href="#section-content-<?php echo $sectionContent['id']; ?>">
                        <?php echo $sectionContent['title']; ?>
                        </a>
                    </h3>
                <?php endforeach; ?>
                <?php } ?>
                <?php if($section['section_type']=='contents'){ ?>
                <?php foreach($section['contents'] as $sectionContent):?>
                    <h3><?php echo $sectionContent['title']; ?></h3>
                    <?php echo $sectionContent['content']; ?>
                <?php endforeach; ?>
                <?php } ?>
                <?php if($loop<$count){ ?>
                <div class="page-break-after"></div>
                <?php } ?>
            <?php endforeach; ?>
            <div class="page-break-after"></div>
            <?php $sectionCount = 0; foreach($sections as $section): if($section['numbered']=='1'){ $sectionCount++; } ?>
                <?php if($section['section_type']=='categorized'){ ?>
                    <?php foreach($section['categories'] as $sectionCategory): ?>
                    <?php if($sectionCategory['category_type']=='policylist'){ ?>
                        <?php $policyCount=0; foreach($sectionCategory['policies'] as $sectionCategoryPolicy): $policyCount++; ?>
                        <table class="policy-table">
                            <tr>
                                <td>Category: <?php if(isset($policyCategories[$sectionCategoryPolicy['policy_category']])){ echo $policyCategories[$sectionCategoryPolicy['policy_category']]; }?></td>
                                <td>Policy Number: <?php echo $sectionCount; ?>.<?php echo sprintf('%02d', $policyCount);?> </td>
                            </tr>
                            <tr>
                                <td>Policy Title: <a name="section-category-policy-<?php echo $sectionCategoryPolicy['id']; ?>">
                                    <?php echo $sectionCategoryPolicy['title']; ?>
                                    </a>
                                </td>
                                <td>
                                First Created: <?php if($sectionCategoryPolicy['policy_issue_date']!=''){  echo date('F d, Y',strtotime($sectionCategoryPolicy['policy_issue_date']));  }?>
                                <br/>
                                Last Revision: <?php if($sectionCategoryPolicy['policy_update_date']!=''){  echo date('F d, Y',strtotime($sectionCategoryPolicy['policy_update_date'])); }?>
                                </td>
                            </tr>
                        </table>    
                        <?php echo $sectionCategoryPolicy['content']; ?>
                        <div class="page-break-after"></div>
                        <?php endforeach; ?>
                    <?php } ?>
                    <?php if($sectionCategory['category_type']=='contentlist'){ ?>
                        <?php foreach($sectionCategory['contents'] as $sectionCategoryContent):?>
                        <?php echo $sectionCategoryContent['content']; ?>
                        <div class="page-break-after"></div>
                        <?php endforeach; ?>
                    <?php } ?>
                    <?php endforeach; ?>
                <?php } ?>
                <?php if($section['section_type']=='contentlist'){ ?>
                    <?php foreach($section['contents'] as $sectionContent):?>
                    <h3><a name="section-content-<?php echo $sectionContent['id']; ?>">
                        <?php echo $sectionContent['title']; ?>
                    </a></h3>
                    <?php echo $sectionContent['content']; ?>
                    <div class="page-break-after"></div>
                <?php endforeach; ?>
                <?php } ?>
            <?php endforeach; ?>
        </main>
    </body>
</html>