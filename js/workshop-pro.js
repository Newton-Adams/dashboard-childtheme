'use strict'

jQuery(document).ready(function ($) {

    // Dark mode
    const setDarkMode = (active = false) => {
        const wrapper = document.querySelector(":root");
        if (active) {
          wrapper.setAttribute("data-theme", "dark");
          localStorage.setItem("theme", "dark");
        } else {
          wrapper.setAttribute("data-theme", "light");
          localStorage.setItem("theme", "light");
        }
    };
      
    const toggleDarkMode = () => {
        const theme = document.querySelector(":root").getAttribute("data-theme");
        // If the current theme is "light", we want to activate dark
        setDarkMode(theme === "light");
    };
    
    const initDarkMode = () => {
        
        const query = window.matchMedia("(prefers-color-scheme: dark)");
        const themePreference = localStorage.getItem("theme");
        
        let active = query.matches;
        if (themePreference === "dark") {
            active = true;
        }
        if (themePreference === "light") {
            active = false;
        }
        
        setDarkMode(active);
        
        query.addListener(e => setDarkMode(e.matches));
        
        const toggleButton = document.querySelector(".light-mode-button");
        toggleButton.addEventListener("click", toggleDarkMode);

    };
    
    initDarkMode();

    //Make sidebar collapsed by default on tablet/mobile
    if(window.innerWidth < 992 && window.innerWidth > 782 ) {
        $('body').addClass('menu-closed')
    }

    //Toggle Sidebar View
    $(document).on('click','#burger-menu svg, .mobile-close, .mobile-overlay', function() {
        $('body').toggleClass('menu-closed')
    })

    // Mobi search 
    $(document).on('click','.mobi-search-icon', function() { 

        $('.mobi-search').toggleClass('show');

        if( $('.mobi-search').hasClass('show') ) {
            $('.mobi-search-input').slideDown('slow');
        }else{
            $('.mobi-search-input').slideUp('slow');
        }

    })

    // Check if system is dark mode (currently set colors to light if it is)
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // Dark mode is preferred
        document.documentElement.style.setProperty('--accent','#009026')
        document.documentElement.style.setProperty('--heading','#27272E')
        document.documentElement.style.setProperty('--body','#425466')
        document.documentElement.style.setProperty('--muted','#7A7A9D')
        document.documentElement.style.setProperty('--background-secondary','#ffffff')
        document.documentElement.style.setProperty('--background-primary','#F7FAFC')
    } 

    //Workshop Doughnut Chart 
    if( $('#workshopChart').length ) {
        var activeVal = $('.active .chart-value').text();
        var completeVal = $('.complete .chart-value').text();
        var awaitingVal = $('.awaiting .chart-value').text();

        var ctx = document.getElementById('workshopChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Complete', 'Waiting'],
                datasets: [{
                    label: '',
                    data: [ 
                        activeVal, 
                        completeVal, 
                        awaitingVal
                    ],
                    backgroundColor: [
                        '#68DBF2',
                        '#2ECF88',
                        '#F7936F'
                    ], 

                }], 
                unitSuffix: "%",
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 90,
                title: {
                    display: true,
                    text: 'Workshop Chart',
                    fontSize: 16,
                    fontWeight: 700, 
                },
                tooltips: {
                    display: false
                },
                plugins: {
                    legend: { 
                        display: false, 
                        position: 'bottom', 
                        align: 'center',
                    }
                }

            }
        });

    }

    //Popup 
    $(document).on('click','.popup-btn',function(e) {  
        e.preventDefault();
        const popup = '#'+$(this).data('popup')
        $(popup).fadeIn('fast', function() {
            $(popup).addClass('show');
            $('body').css('overflow','hidden');
        });
    });

    $(document).on('click','.popup-overlay, .close-popup, .cancel-popup',function() { 

        $('.popup').fadeOut('fast', function() {
            $(this).removeClass('show');
            $('body').css('overflow','auto');
        });
        
    });
  
    // Tabs 
    if($('.tab-container').length > 0) {

        $('.tab-item').hide();
        $('.tab-item:first-child').show();
        $('.tab-button:first-child').addClass('active');

        $(document).on('click','.tab-button',function() {
            // Hide all tab content 
            $(this).closest('.tab-container').children('.tab-content').children('.tab-item').hide();
    
            // Show the selected tab content 
            const tabId = $(this).data('tab');
            $(`#${tabId}`).fadeIn();
    
            // Optional: Add active class to the selected tab button
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
    
        })

        // if url has a hash, show the tab 
        if(window.location.hash) {
            const tab = window.location.hash.replace('#','') + '-tab'
            $(`.tab-button[data-tab="${tab}"]`).click()
        }
    }

    // Default quote message key words 
    function typeInTextarea(newText, el = document.activeElement) {
        const [start, end] = [el.selectionStart, el.selectionEnd];
        el.setRangeText(newText, start, end, 'select');
    }
    
    // on click of the button, insert the text into textarea
    $(document).on('click','.key-word',function(e) {
        e.preventDefault();
        let keyWord = $(this).data('key'); 
        let textarea = $(this).closest('.form-row').find('textarea')[0];
        typeInTextarea(keyWord, textarea);
    })
    
    // limit the number of words in a textarea on keyup 
    $(document).on('keyup','[data-max-words]',function() { 
        const maxWords = $(this).data('max-words')
        const words = $(this).val().split(' ').length
        if(words > maxWords) {
            $(this).val($(this).val().split(' ').slice(0,maxWords).join(' '))
        }
    });

})


