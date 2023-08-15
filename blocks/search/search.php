<div class="bg-zinc-800 pt-3 px-3 rounded-md">

    <form action="" class="w-full pb-3">
        <label for="">
            <input class="block w-full bg-zinc-900 p-2 rounded-md text-white" placeholder="Search <?php the_field('type') ?>" type="text" onkeyup="window.search(this)" data-post-type="<?php the_field('type') ?>" id="search-box" name="search">
        </label>
        <div class="results">

        </div>

    </form>
    <script>

        document.querySelector('#search-box').addEventListener('focusout', function (e) {
            setTimeout(() => {
                document.querySelector('.results').innerHTML = null;
            }, 300)

        })

        window.search = function search(e) {
            let value = e.value;

            let posts;

            let pt = document.querySelector('#search-box').getAttribute('data-post-type');

            let response = fetch(`/wp-json/wp/v2/search?subtype=${pt}&search=${value}`).then(e => {
                e.json().then(function(values) {


                    // populate search results
                    let html = document.querySelector('.results');

                    let container = document.createElement('ul');

                    container.setAttribute('class', 'result-box');
                    console.log(values)

                    values.forEach((e) => {


                        let li = document.createElement('li');
                        li.setAttribute('class', 'result-item');
                        let a = document.createElement('a');


                        a.setAttribute('href',  e.url);
                        a.setAttribute('class',  'text-white border-gray-600 pt-3 block');
                        a.innerHTML = e.title;

                        li.appendChild(a);
                        container.appendChild(li);

                    })

                    html.innerHTML = null;
                    html.appendChild(container);
                });
            })
        }
    </script>

</div>
