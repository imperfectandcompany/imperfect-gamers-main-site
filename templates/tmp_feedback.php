<div class="bg-<?php echo $f_type; ?>-300 text-<?php echo $f_type; ?>-800 mt-1" role="alert">
    <?php if($f_header): ?>
        <b><?php echo htmlspecialchars($f_header, ENT_QUOTES); ?></b><br/>
    <?php endif; ?>
    <ul>
        <?php foreach($feedback as $notice): ?>
            <li>&emsp;<?php echo $notice; ?></li>
        <?php endforeach; ?>     
    <ul>
</div>