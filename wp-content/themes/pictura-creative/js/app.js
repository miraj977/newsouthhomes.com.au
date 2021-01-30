( function ( $ )
{

	$( ".loadmoreProjects" ).click( function ( e )
	{
		var choicesLoadmore = {};
		var pageNum = 2;
		var filterCLicked = false;
		if ( filterCLicked == true )
		{
			pageNum = 2;
			filterCLicked = false;
		}
		//console.log(pageNum);
		e.preventDefault();

		var data = {
			'action': 'load_more_projects',
			'currentPage': pageNum,
			"loadmore": "true",
			'choices': choicesLoadmore

		};
		$.post( ajaxurl, data, function ( response )
		{
			if ( $.trim( response ) != '' )
			{

				$( ".projectWrap" ).append( response );
				pageNum++;
			} else
			{
				$( '.loadmoreBlog' ).hide();
			}
		} );
	} );

//Make single checkbox check
	


$(document).on('click', '.bedroomsCheck', function() { 
	var clicked;
  clicked = $(this);

  if ($(this).is(':checked')) {
    $('.bedroomsCheck:checked').not($(this)).each(function() {
      $(this).prop('checked', false);
      $(this).trigger('change');
    });
  };
});

$(document).on('change', '.bedroomsCheck', function() { 
	var clicked= $(this);
  if (!clicked.is($(this))) {
    //do something useful here
    console.log($(this).val() + ' changed');
  };
});
	
	$(document).on('click', '.hometypeCheck', function() { 
	var clicked;
  clicked = $(this);

  if ($(this).is(':checked')) {
    $('.hometypeCheck:checked').not($(this)).each(function() {
      $(this).prop('checked', false);
      $(this).trigger('change');
    });
  };
});

$(document).on('change', '.hometypeCheck', function() { 
	var clicked= $(this);
  if (!clicked.is($(this))) {
    //do something useful here
    console.log($(this).val() + ' changed');
  };
});
	$(document).on('click', '.bathroomsCheck', function() { 
	var clicked;
  clicked = $(this);

  if ($(this).is(':checked')) {
    $('.bathroomsCheck:checked').not($(this)).each(function() {
      $(this).prop('checked', false);
      $(this).trigger('change');
    });
  };
});

$(document).on('change', '.bathroomsCheck', function() { 
	var clicked= $(this);
  if (!clicked.is($(this))) {
    //do something useful here
    console.log($(this).val() + ' changed');
  };
});
	$(document).on('click', '.storeyCheck', function() { 
	var clicked;
  clicked = $(this);

  if ($(this).is(':checked')) {
    $('.storeyCheck:checked').not($(this)).each(function() {
      $(this).prop('checked', false);
      $(this).trigger('change');
    });
  };
});

$(document).on('change', '.storeyCheck', function() { 
	var clicked= $(this);
  if (!clicked.is($(this))) {
    //do something useful here
    console.log($(this).val() + ' changed');
  };
});
	
// $(document).on('click', '.bedroomsCheck', function() { 
// 	//$(!this).prop("checked",true).click();
// 	 $('.bedroomsCheck').not(this).prop('checked', false);
//   $('.bedroomsCheck').each( function (){
// 	if(!(this) && is(':checked')){
// 		//how do I target the one that meets condition?
// 	}
//   });
	
// });
// 	$(document).on('click', '.storeyCheck', function() {      
//     $('.storeyCheck').not(this).prop('checked', false).trigger('change');      
// });
// 	$(document).on('click', '.bathroomsCheck', function() {      
//     $('.bathroomsCheck').not(this).prop('checked', false).trigger('change');      
// });
// $(document).on('click', '.hometypeCheck', function() {      
//     $('.hometypeCheck').not(this).prop('checked', false).trigger('change');      
// });
	
	
	$( document ).ready( function ()
	{
		var $filters = $( '.works-filter' ); // find the filters
		var $works = $( '.workItem' ); // find the portfolio items
		var showAll = $( '.showAll' ); // identify the "show all" button

		var cFilter, cFilterData; // declare a variable to store the filter and one for the data to filter by
		var filtersActive = []; // an array to store the active filters

		$filters.on('change', function ()
		{ // if filters are clicked
			cFilter = $( this );
			cFilterData = cFilter.attr( 'data-filter' ); // read filter value

			highlightFilter();
			applyFilter();
			checkIfNoResults();
		} );



		const minSizeHouse = document.querySelector( "select[name='home-size-min']" );
		const maxSizeHouse = document.querySelector( "select[name='home-size-max']" );

		const minSizeLot = document.querySelector( "select[name='lot-size-min']" );
		const maxSizeLot = document.querySelector( "select[name='lot-size-max']" );

		var works = document.getElementsByClassName( "workItem" ); // find the portfolio items


		$( '.clear-btn' ).click( function ()
		{
			resetFilters();
		} );
		function resetFilters ()
		{
			const ddMenus = document.getElementsByClassName( "d-sel" );
			const allFilters = document.getElementsByClassName( "works-filter" );
			const allHouses = document.getElementsByClassName( "workItem" );
			const checkBoxes = document.querySelectorAll( "input[type='checkbox']" );

			for ( let h = 0; h < allHouses.length; ++h )
			{
				const house = allHouses[ h ];

				if ( !house.className.includes( "show-workItem" ) )
				{
					house.className += " show-workItem";
				}
			}

			for ( let i = 0; i < allFilters.length; ++i )
			{
				if ( allFilters[ i ].className.includes( "works-filter-active" ) )
				{
					allFilters[ i ].className = allFilters[ i ].className.replace( " works-filter-active", "" );
				}
			}

			for ( let j = 0; j < checkBoxes.length; ++j )
			{
				checkBoxes[ j ].checked = false;
			}

			for ( let k = 0; k < ddMenus.length; ++k )
			{
				ddMenus[ k ].options[ 0 ].selected = "selected";
			}

			jQuery( "select[name*='home-size-min']" ).change();
			jQuery( "select[name*='home-size-max']" ).change();
			jQuery( "select[name*='lot-size-min']" ).change();
			jQuery( "select[name*='lot-size-max']" ).change();
			//highlightFilter();
			//applyFilter();
		}

		function checkIfNoResults ()
		{
			// Any results to show?
			let numOfHiddenHouses = 0;
			const houseContainer = document.querySelector( ".projectWrap" );
			const numOfTotalHouses = houseContainer.children.length;

			for ( let k = 0; k < houseContainer.children.length; ++k )
			{
				if (
					
					!houseContainer.children[ k ].className.includes( "show-workItem" )
				)
				{
					numOfHiddenHouses++;
				}
			}

			if ( numOfHiddenHouses == numOfTotalHouses )
			{
				document.getElementById( 'noResultsFound' ).style.color = "#000";
				document.getElementById( 'noResultsFound' ).style.position = "relative";
			} else
			{
				document.getElementById( 'noResultsFound' ).style.color = "#fff";
				document.getElementById( 'noResultsFound' ).style.position = "absolute";
			}
		}



		$( ".d-sel" ).change( function ()
		{
			const request = $( this ).attr( "name" );

			let minHouseSize = Number( minSizeHouse.options[ minSizeHouse.selectedIndex ].getAttribute( "value" ) );
			let maxHouseSize = Number( maxSizeHouse.options[ maxSizeHouse.selectedIndex ].getAttribute( "value" ) );

			let minLotSize = Number( minSizeLot.options[ minSizeLot.selectedIndex ].getAttribute( "value" ) );
			let maxLotSize = Number( maxSizeLot.options[ maxSizeLot.selectedIndex ].getAttribute( "value" ) );
			//console.log(`min: ${minHouseSize}, max: ${maxHouseSize}`);

			for ( let i = 0; i < works.length; ++i )
			{
				if ( request.includes( "home-size" ) )
				{
					let houseSize = null;

					if ( works[ i ].className && works[ i ].className.includes( "size" ) )
					{
						let classNames = works[ i ].className.split( " " );

						for ( let j = 0; j < classNames.length; ++j )
						{
							if ( classNames[ j ].includes( "size" ) )
							{
								houseSize = Number( classNames[ j ].split( "e" )[ 1 ] );
							}
						}

						if ( !works[ i ].className.includes( "show-workItem" ) )
						{
							if ( houseSize >= minHouseSize && houseSize <= maxHouseSize )
							{
								works[ i ].className += " show-workItem";
							}
						}
						else
						{
							if ( houseSize < minHouseSize || houseSize > maxHouseSize )
							{
								works[ i ].className = works[ i ].className.replace( "show-workItem", "" );
							}
						}
					}
				}
				else if ( request.includes( "lot-size" ) )
				{
					let lotSize = null;

					if ( works[ i ].className && works[ i ].className.includes( "lot" ) )
					{
						let classNames = works[ i ].className.split( " " );

						for ( let j = 0; j < classNames.length; ++j )
						{
							if ( classNames[ j ].includes( "lot" ) )
							{
								lotSize = Number( classNames[ j ].split( "t" )[ 1 ] );
							}
						}

						if ( !works[ i ].className.includes( "show-workItem" ) )
						{
							if ( lotSize >= minLotSize && lotSize <= maxLotSize )
							{
								works[ i ].className += " show-workItem";
							}
						}
						else
						{
							if ( lotSize < minLotSize || lotSize > maxLotSize )
							{
								works[ i ].className = works[ i ].className.replace( "show-workItem", "" );
							}
						}
					}
				}
			}

			checkIfNoResults();
		} );


		function highlightFilter ()
		{
			var filterClass = 'works-filter-active';
			if ( cFilter.hasClass( filterClass ) )
			{
				cFilter.removeClass( filterClass );
				removeActiveFilter( cFilterData );
			} else if ( cFilter.hasClass( 'showAll' ) )
			{
				$filters.removeClass( filterClass );
				filtersActive = []; // clear the array
				cFilter.addClass( filterClass );
			} else
			{
				showAll.removeClass( filterClass );
				cFilter.addClass( filterClass );
				filtersActive.push( cFilterData );
			}
		}

		function applyFilter ()
		{
			// go through all portfolio items and hide/show as necessary
			$works.each( function ()
			{
				var i;
				var classes = $( this ).attr( 'class' ).split( ' ' );
				//console.log( classes );
				if ( cFilter.hasClass( 'showAll' ) || filtersActive.length == 0 )
				{ // makes sure we catch the array when its empty and revert to the default of showing all items
					$works.addClass( 'show-workItem' ); //show them all
				} else
// 				{
// 					$( this ).removeClass( 'show-workItem' );
// 					for ( i = 0; i < classes.length; i++ )
// 					{
// 						if ( filtersActive.indexOf( classes[ i ] ) > -1 )
// 						{
// 							$( this ).addClass( 'show-workItem' );
// 						}

// 					}
// 				}
				{
				    $( this ).removeClass( 'show-workItem' );
					let checker = ( arr, target ) => target.every( v => arr.includes( v ) );

					for ( i = 0; i < classes.length; i++ )
					{
						if ( checker( classes, filtersActive ) == true)
						{
							$( this ).addClass( 'show-workItem' );
							//console.log('Classes'+classes +'  Active'+ filtersActive);
						}

					}
				}
			} );

		}

		// remove deselected filters from the ActiveFilter array
		function removeActiveFilter ( item )
		{
			var index = filtersActive.indexOf( item );
			if ( index > -1 )
			{
				filtersActive.splice( index, 1 );
			}
		}

	} );


	$( document ).ready( function ()
	{
		//**** ANIMATE ON SCROLL***/
		// AOS.init( {
		// 	duration: 1200,
		// 	delay: 5
		// } );


		/** MOBILE SUB MENU OPEN**/
		$( ".menu-half-only-menu .menu-item-has-children" ).append( "<a href='#openSubmenu' class='openSubmenu'>Open Submenu</a>" );

		$( ".openSubmenu" ).click( function ( e )
		{
			$( this ).prev( ".sub-menu" ).slideToggle();
			$( this ).toggleClass( "opened" );
			e.preventDefault();
		} );



		//****** PROCESS SCROLLER */

		$( window ).scroll( function ()
		{
			if ( $( document ).scrollTop() > 1200 )
			{
				$( ".process" ).addClass( "fix" );
			} else
			{
				$( ".process" ).removeClass( "fix" );
			}

			var scroll = $( window ).scrollTop(),
				headH = $( ".process" ).height();

			if ( scroll >= headH )
			{
				$( ".section-div" ).hide();
			} else
			{
				$( ".section-div" ).show();
				$( ".section-div" ).css( 'display', 'inherit' );
			}

			 //console.log( $(this).scrollTop() );


			if ( $( document ).scrollTop() > 0 && $( document ).scrollTop() < 1608 )
			{
				$( "#go1" ).addClass( "underline" );

			}
			else
			{
				$( "#go1" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 1609 && $( document ).scrollTop() < 2608 )
			{
				$( "#go2" ).addClass( "underline" );
			}
			else
			{
				$( "#go2" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 2609 && $( document ).scrollTop() < 3642 )
			{
				$( "#go3" ).addClass( "underline" );
			}
			else
			{
				$( "#go3" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 3642 && $( document ).scrollTop() < 4770 )
			{
				$( "#go4" ).addClass( "underline" );
			}
			else
			{
				$( "#go4" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 4771 && $( document ).scrollTop() < 5670 )
			{
				$( "#go5" ).addClass( "underline" );
			}
			else
			{
				$( "#go5" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 5671 && $( document ).scrollTop() < 6900 )
			{
				$( "#go6" ).addClass( "underline" );
			}
			else
			{
				$( "#go6" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 6901 && $( document ).scrollTop() < 7930 )
			{
				$( "#go7" ).addClass( "underline" );
			}
			else
			{
				$( "#go7" ).removeClass( "underline" );
			}
			if ( $( document ).scrollTop() > 7931 && $( document ).scrollTop() < 9842 )
			{
				$( "#go8" ).addClass( "underline" );
			}
			else
			{
				$( "#go8" ).removeClass( "underline" );
			}
		} );

		/****** PROCESS SCROLLER ENDS HERE */


		/** STICKY MENU CLASS **/
		$( window ).scroll( function ()
		{
			//console.log($(this).scrollTop());
			$( this ).scrollTop() >= 100 ? $( "body" ).addClass( "has-scrolled" ) : $( "body" ).removeClass( "has-scrolled" );
			if ( $( document ).scrollTop() < 100 )
			{
				$( "#white-burger" ).css( "display", "block" );
				$( "#black-burger" ).css( "display", "none" );
			} else
			{
				$( "#black-burger" ).css( "display", "block" );
				$( "#white-burger" ).css( "display", "none" );
			}
		} );


		/*** ACCORDIAN ***/
		$( '.toggle' ).click( function ( e )
		{
			e.preventDefault();
			var $this = $( this );

			if ( $this.next().hasClass( 'show' ) )
			{
				$this.next().removeClass( 'show' );
				$this.removeClass( 'showPanel' );
				$this.next().slideUp( 350 );
			} else
			{
				$this.parent().parent().find( 'li .inner' ).removeClass( 'show' );
				$this.parent().parent().find( '.toggle' ).removeClass( 'showPanel' );
				// $this.parent().parent().find( 'li .inner' ).slideUp( 350 );
				$this.toggleClass( "showPanel" );
				$this.next().toggleClass( 'show' );
				$this.next().slideToggle( 350 );
			}
		} );


		/*** HERO SLIDER **/
		jQuery( '.heroFullScreen' ).flexslider( {
			animation: "fade",
			controlNav: true,
			directionNav: true,
			prevText: "<img src='" + themeUrl + "/images/prev.svg'>",
			nextText: "<img src='" + themeUrl + "/images/next.svg'>",
		} );

		/*** TESTIMONIAL SLIDER **/
		jQuery( '.testimonialSlider' ).flexslider( {
			animation: "slide",
			controlNav: true,
			directionNav: true,
			prevText: "<img src='" + themeUrl + "/images/dark-left.svg'>",
			nextText: "<img src='" + themeUrl + "/images/dark-right.svg'>",
		} );

		/*** CLIENTLOGO SLIDER **/

		jQuery( '.clientLogo' ).flexslider( {

			animation: "slide",
			controlNav: true,
			directionNav: true,
			minItems: 1,
			itemWidth: 300,
			itemMargin: 30,
			maxItems: 3,
			prevText: "<img src='" + themeUrl + "/images/dark-left.svg'>",
			nextText: "<img src='" + themeUrl + "/images/dark-right.svg'>",
		} );
		/*animation: "slide",
		controlNav: false,            
		directionNav: true,	
		minItems: 2,
		itemWidth: 150,
		itemMargin: 25,
		maxItems:5,
		prevText: "<img src='"+themeUrl+"/images/dark-left.svg'>",
		nextText: "<img src='"+themeUrl+"/images/dark-right.svg'>",
		});
	

	/*** BLOG SLIDER **/
		jQuery( '.blogSlider' ).flexslider( {
			animation: "slide",
			controlNav: true,
			directionNav: true,
			minItems: 1,
			itemWidth: 300,
			itemMargin: 30,
			maxItems: 3,
			prevText: "<img src='" + themeUrl + "/images/dark-left.svg'>",
			nextText: "<img src='" + themeUrl + "/images/dark-right.svg'>",
		} );

		/*** PROJECT SLIDER **/
		jQuery( '.projectSlider' ).flexslider( {
			animation: "slide",
			controlNav: true,
			directionNav: true,
			minItems: 1,
			itemWidth: 600,
			itemMargin: 40,
			maxItems: 2,
			prevText: "<img src='" + themeUrl + "/images/dark-left.svg'>",
			nextText: "<img src='" + themeUrl + "/images/dark-right.svg'>",
		} );



		/**** SCROLL BOTTOM FROM HERO ***/
		// 		$( 'a[href="#content"]' ).on( 'click', function ( e ) { scrollDown(); } );

		// 		$( '.downArrow' ).on( 'click', function ( e ) { scrollDown(); } );
		// 		function scrollDown ()
		// 		{
		// 			$( 'html, body' ).animate( {
		// 				scrollTop: $( "#content" ).offset().top
		// 			}, 2000 );
		// 			return false;
		// 			e.preventDefault();
		// 		}

		//Open Search //	
		jQuery( '.searchMenu a' ).on( 'click', function ( event )
		{
			jQuery( ".searchBar" ).addClass( "open" );
			event.preventDefault();
		} );

		jQuery( '.closeSearch' ).on( 'click', function ( event )
		{
			jQuery( ".searchBar" ).removeClass( "open" );
			event.preventDefault();
		} );

		//ENQUIRY MODAL
		var fadespeed = 'fast';
		jQuery( '.enquiry_btn' ).on( 'click', function ( event )
		{
			event.preventDefault();
			jQuery( '.enquiry-modal' ).fadeIn( fadespeed );
			jQuery( 'html' ).css( 'overflow', 'hidden' );
			jQuery( 'body' ).addClass( 'enquiry-open' );
		} );
		jQuery( '.modal-close' ).on( 'click', function ()
		{
			jQuery( '.enquiry-modal' ).fadeOut( fadespeed );
			jQuery( 'html' ).css( 'overflow', 'visible' );
			jQuery( 'body' ).removeClass( 'enquiry-open' );
		} );
		jQuery( document ).on( 'keydown', function ( e )
		{
			if ( e.keyCode === 27 )
			{
				jQuery( ".enquiry-modal" ).fadeOut( fadespeed );
				jQuery( 'body' ).removeClass( 'enquiry-open' );
				jQuery( 'html' ).css( 'overflow', 'visible' );
			}
		} );

		//ENQUIRE HNL MODAL
		var fadespeed = 'fast';
		jQuery( '.enquire_modal_btn' ).on( 'click', function ( event )
		{

			event.preventDefault();
			jQuery( '.hnlenquiry' ).css( 'top', '0' );
			jQuery( '.hnlenquiry' ).css( 'display', 'block' );
			jQuery( 'html' ).css( 'overflow', 'hidden' );
			jQuery( 'body' ).addClass( 'enquiry-open' );
		} );
		jQuery( '.modal-close' ).on( 'click', function ()
		{
			jQuery( '.hnlenquiry' ).css( 'top', '-100%' );
			jQuery( '.hnlenquiry' ).css( 'display', 'none' );
			jQuery( 'html' ).css( 'overflow', 'visible' );
			jQuery( 'body' ).removeClass( 'enquiry-open' );
		} );
		jQuery( document ).on( 'keydown', function ( e )
		{
			if ( e.keyCode === 27 )
			{
				jQuery( ".hnlenquiry" ).css( 'top', '-100%' );
				jQuery( 'body' ).removeClass( 'enquiry-open' );
				jQuery( 'html' ).css( 'overflow', 'visible' );
			}
		} );



		//MENU MODAL

		jQuery( '.burger' ).on( 'click', function ( event )
		{
			event.preventDefault();
			//jQuery('.menu-wrap').fadeIn('fast');
			jQuery( 'html' ).css( 'overflow', 'hidden' );
			jQuery( 'body' ).addClass( 'fullMenu-open' );
			jQuery( '.menu-bg' ).removeClass( 'hide' );

		} );
		jQuery( '.modal-close' ).on( 'click', function ()
		{
			//jQuery('.menu-wrap').fadeOut(fadespeed);
			jQuery( 'html' ).css( 'overflow', 'visible' );
			jQuery( 'body' ).removeClass( 'fullMenu-open' );
			jQuery( '.menu-bg' ).addClass( 'hide' );
		} );
		jQuery( document ).on( 'keydown', function ( e )
		{
			if ( e.keyCode === 27 )
			{
				//jQuery('.menu-wrap').fadeOut(fadespeed);
				jQuery( 'html' ).css( 'overflow', 'visible' );
				jQuery( 'body' ).removeClass( 'fullMenu-open' );
				jQuery( '.menu-bg' ).addClass( 'hide' );
			}
		} );

		/****** ADD TAGET BLANK FOR EXTERNAL LINK***/
		$( "a[target!='_blank'][href$='.pdf']" ).attr( "target", "_blank" );


		$( 'a' ).each( function ()
		{

			if ( this.href.indexOf( location.hostname ) == -1 )
			{
				$( this ).attr( {
					target: "_blank",
				} );
			}
		} );

		/**** SCROLL TOP FROM FOOTER ***/


		$( ".goTop" ).click( function ( event )
		{
			event.preventDefault();
			$( "html, body" ).animate( {
				scrollTop: 0
			}, 800 );
		} );

// 		$( window ).scroll( function ()
// 		{
// 			if ( $( this ).scrollTop() > 1220 )
// 			{
// 				$( '.goTop' ).fadeIn();
// 			} else
// 			{
// 				$( '.goTop' ).fadeOut();
// 			}
// 		} );

		/*	
	
		$.fn.visible = function(partial) {
	    
		  var $t            = $(this),
			  $w            = $(window),
			  viewTop       = $w.scrollTop(),
			  viewBottom    = viewTop + $w.height(),
			  _top          = $t.offset().top,
			  _bottom       = _top + $t.height(),
			  compareTop    = partial === true ? _bottom : _top,
			  compareBottom = partial === true ? _top : _bottom;
	    
		return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
	
	  };
		var win = $(window);
	
		var allMods = $(".animate:not([animate-sequence])");
		var animateSequences = $(".animate[animate-sequence]");
	
	
		allMods.each(function(i) {
			var li = $(this);
			if (li.visible(true)) {
				li.addClass('visible-animation');
			}
		});
	
	  
			var animateDelay = 0;
			animateSequences.each(function(index){
				if ($(this).visible(true)) {
					setTimeout(function(){ $(animateSequences[index]).addClass('visible-animation') }, animateDelay);
					animateDelay += 100;
				}
			});
		
		win.scroll(function(event) {
	
		var scroll = win.scrollTop();
		
		  allMods.each(function(i) {
			var li = $(this);
			if (li.visible(true)) {
	
				setTimeout(function() {
			  li.addClass('visible-animation');
				
			}, 100); // delay 200 ms
				}
		  });
		  
				var animateDelay = 0;
				animateSequences.each(function(index){
					if ($(this).visible(true)) {
						setTimeout(function(){ $(animateSequences[index]).addClass('visible-animation') }, animateDelay);
						animateDelay += 100;
					}
				});
		  
		});*/

	} );

} )( jQuery ); 
