<section class="countdown-area">
    <div class="container">
        <div id="event-countdown" class="event-countdown" data-event-date="<?php echo date('r',strtotime($event->start_date));?>">
            <div id="timer">
                <div id="days"></div>
                <div id="hours"></div>
                <div id="minutes"></div>
                <div id="seconds"></div>
            </div>
        </div>
    </div>
</section>