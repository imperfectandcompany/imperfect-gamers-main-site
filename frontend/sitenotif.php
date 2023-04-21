<?php if (count($GLOBALS['errors']) > 0): ?>
    <?php foreach ($GLOBALS['errors'] as $error): ?>
        <div x-data="{ open: true }" x-bind:class="! open ? 'hidden' : 'block'"
            class="flex animate__animated animate__fadeIn animate__delay-0s text-white  select-none ">
            <div class="flex gap-4 bg-red-900 bg-opacity-40 p-4 rounded-md">
                <div class="w-max" @click="open = !open" class="cursor-pointer transition focus:outline-none">
                    <div class="h-10 w-10 flex rounded-full bg-red-500 cursor-pointer hover:bg-opacity-30 transition bg-opacity-40 hover:text-red-400 text-white">
                        <span class="material-icons material-icons-outlined m-auto " style="font-size:20px">gpp_bad</span>
                    </div>
                </div>
                <div class="space-y-1 text-sm">
                    <h6 class="font-medium text-white">Fatal error</h6>
                    <p class="text-red-100 leading-tight">
                        <?php echo $error; ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
