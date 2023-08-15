<div class="bg-zinc-800 p-5 rounded-md border border-gray-600 text-white">
    <h1 class="text-2xl mb-3"><?php the_field('title') ?></h1>
    <p class="text-sm">
        <?php if (get_field('description')) {
            the_field('description');
        } else {
            ?>
            Use our K/D Calculator to calculate your Kill / Death (K/D) Ratio in video games such as Call of Duty.
            <?php
        } ?>
    </p>
    <form action="">
        <label for="kills" class="block mb-3 w-full">
            <span class="mb-1">Kills</span>
            <input onkeyup="calculate()" name="kills" class="p-3 mt-1 block rounded-md border border-gray-600 bg-zinc-900 text-white" id="kills" type="text" placeholder="Number of kills">
        </label>
        <label for="deaths" class="block w-full mb-5">
            <span class="mb-1">Deaths</span>
            <input onkeyup="calculate()" name="deaths" class="p-3 mt-1 block rounded-md border border-gray-600 bg-zinc-900 text-white" id="deaths" type="text" placeholder="Number of deaths">
        </label>
    </form>
    <h3 class="text-2xl">Your K/D is     <span id="kd" class=""></span>
    </h3>

    <script>
        function calculate() {
            let kills = parseInt(document.querySelector('#kills').value);
            let deaths = parseInt(document.querySelector('#deaths').value);

            if(kills / deaths) {
                document.querySelector('#kd').innerHTML = Math.round((kills / deaths) * 100) / 100;
            }
        }
    </script>
</div>
