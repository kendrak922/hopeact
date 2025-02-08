/*********************************
    News Listing JS Class
*********************************/

(function ($) {

    class AjaxPostsArchive {

        paged = 1;
        post_type = 'post';
        posts_per_page = 3; // Number of articles per page
        category = fn__general.getQueryParam('cat');
        tags = null;

        constructor(block_id) {
            this.block_id = block_id;
        }

        //create data for ajax call
        get_query_vars() {
            return {
                block_id: this.block_id,
                paged: this.paged,
                post_type: this.post_type,
                posts_per_page: this.posts_per_page,
                cat: this.category,
                tags: this.tags,
                pagination: true
            }
        }

        //run ajax to fetch news
        loadNews() {
            let currentObj = this;
            $.ajax({
                url: php_vars.ajax_url,
                type: 'post',
                dataType: "json",
                data: {
                    action: 'ajax_posts',
                    query_vars: this.get_query_vars(),
                    object: this
                },
                success: function (data) {
                    if(data.more){
                        $('#' + currentObj.block_id+' .loadmore').show();
                    } else { 
                        $('#' + currentObj.block_id + ' .loadmore').hide(); 
                    }
                    if (data.paged <= 1){
                        document.getElementById(currentObj.block_id).querySelector(".results").innerHTML = '';
                    }
                    if (data.cards){
                        data.cards.forEach((card) => {
                            document.getElementById(currentObj.block_id).querySelector(".results").innerHTML += '<li class="grid__col grid__col--grow-0 grid__col--12 grid__col-md--6 grid__col-lg--4">' + card + '</li>';
                        });
                    }
                    fn__general.card_listeners(document.getElementById(currentObj.block_id));
                }
            })
        }
        
        //Load more / Pagination
        attach_click_events() {
            let navItems = document.getElementById(this.block_id).querySelectorAll('.loadmore');
            navItems.forEach((navItem) => {
                navItem.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.paged = this.paged + 1;
                    this.loadNews();
                    return false;
                });
            });
        }

        filter_click_events() {
            let filterItems = document.getElementById(this.block_id).querySelectorAll('.jumpnav__container button');
            filterItems.forEach((filterItem) => {
                let categoryID = filterItem.getAttribute("data-category");
                filterItem.addEventListener('click', (e) => {
                    e.preventDefault();
                    filterItems.forEach((filterItemInner) => {
                        filterItemInner.classList.remove("is-active");
                    });
                    filterItem.classList.add("is-active");
                    this.paged = 1;
                    this.category = categoryID;
                    this.loadNews();
                    return false;
                });
            });
        }

        toggle_listeners() {
            const filterToggle = document.getElementById(this.block_id).querySelector('.jumpnav .jumpnav__toggle');
            const filterTrigger = document.getElementById(this.block_id).querySelectorAll('.jumpnav__container button');
            const filterSelected = filterToggle.querySelector('.toggle__text');
    
            if (filterTrigger.length) {
                /***** TOGGLE EVENT *****/
                filterTrigger.forEach(trigger => {
                    trigger.addEventListener('click', () => {
                        filterSelected.innerHTML = trigger.innerHTML;
                        filterToggle.click();
                    });
                });
            }
        };

    }
        $(".block--news-listing").each(function () {
            let blockHandler = new AjaxPostsArchive($(this).attr("id"));
            //blockHandler.loadNews(false);
            blockHandler.toggle_listeners();
            blockHandler.filter_click_events();
            blockHandler.attach_click_events();
            blockHandler.loadNews();
        });


})(jQuery);