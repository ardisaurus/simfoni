/* Drop Down Menu */
/* Works with mootools-release-1.11.js */
/* script taken at http://dev.visualdrugs.net/mootools/dropdown_menu.html */

		Element.extend(
		{
			hide: function()
			{
				return this.setStyle('display', 'none');
			},

			show: function()
			{
				return this.setStyle('display', 'block');
			}
		});

		var DropdownMenu = new Class({
			initialize: function(element)
			{
				$A($(element).childNodes).each(function(el)
				{
					if(el.nodeName.toLowerCase() == 'li')
					{
						$A($(el).childNodes).each(function(el2)
						{
							if(el2.nodeName.toLowerCase() == 'ul')
							{
								$(el2).hide();

								el.addEvent('mouseover', function()
								{
									el2.show();
									return false;
								});

								el.addEvent('mouseout', function()
								{
									el2.hide();
								});
								new DropdownMenu(el2);
							}
						});
					}
				});
				return this;
			}
		});

		Window.onDomReady(function() {

			new DropdownMenu($('nav'))

		});



