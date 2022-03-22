<?php if(count($faqs)>0){ ?>
<section class="faq-area about-area-two ptb-120  bg-image">
    <div class="container">
        <div class="faq-accordion">
            <ul class="accordion">
                <?php $i=0; foreach($faqs as $faq): $i++; ?>
                <li class="accordion-item">
                    <a class="accordion-title <?php if($i=='1'){ echo "active"; }?>" href="javascript:void(0)">
                        <span><i class="icofont-plus"></i></span>
                        <?php echo $faq['question']; ?>
                    </a>

                    <div class="accordion-content <?php if($i=='1'){ echo "show"; }?>"><?php echo $faq['answer']; ?></div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>


    </div>
</section>
<?php } ?>