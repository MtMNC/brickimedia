/*!
 * VisualEditor UserInterface DropdownTool class.
 *
 * @copyright 2011-2013 VisualEditor Team and others; see AUTHORS.txt
 * @license The MIT License (MIT); see LICENSE.txt
 */

/**
 * UserInterface dropdown tool.
 *
 * @abstract
 * @class
 * @extends ve.ui.Tool
 * @constructor
 * @param {ve.ui.Toolbar} toolbar
 * @param {Object} [config] Config options
 */
ve.ui.DropdownTool = function VeUiDropdownTool( toolbar, config ) {
	// Parent constructor
	ve.ui.Tool.call( this, toolbar, config );

	// Properties
	this.menu = new ve.ui.MenuWidget( { '$$': this.$$ } );
	this.$icon = this.$$( '<div class="ve-ui-dropdownTool-icon ve-ui-icon-down"></div>' );
	this.$label = this.$$( '<div class="ve-ui-dropdownTool-label"></div>' );
	this.$labelText = this.$$( '<span>&nbsp;</span>' );

	// Events
	this.$$( this.getElementDocument() )
		.add( this.toolbar.getSurface().getView().$ )
		.mousedown( ve.bind( this.onBlur, this ) );
	this.$.on( {
		'mousedown': ve.bind( this.onMouseDown, this ),
		'mouseup': ve.bind( this.onMouseUp, this )
	} );
	this.menu.connect( this, { 'select': 'onMenuItemSelect' } );

	// Initialization
	this.$
		.append( this.$icon, this.$label, this.menu.$ )
		.addClass(
			've-ui-dropdownTool ve-ui-dropdownTool-' +
			( this.constructor.static.cssName || this.constructor.static.name )
		);
	if ( this.constructor.static.titleMessage ) {
		this.$.attr( 'title', ve.msg( this.constructor.static.titleMessage ) );
	}
	this.$label.append( this.$labelText );
};

/* Inheritance */

ve.inheritClass( ve.ui.DropdownTool, ve.ui.Tool );

/* Methods */

/**
 * Handle the mouse button being pressed.
 *
 * @method
 * @param {jQuery.Event} e Mouse down event
 */
ve.ui.DropdownTool.prototype.onMouseDown = function ( e ) {
	if ( e.which === 1 ) {
		return false;
	}
};

/**
 * Handle the mouse button being released.
 *
 * @method
 * @param {jQuery.Event} e Mouse up event
 */
ve.ui.DropdownTool.prototype.onMouseUp = function ( e ) {
	if ( e.which === 1 ) {
		// Toggle menu
		if ( this.menu.isVisible() ) {
			this.menu.hide();
		} else {
			this.menu.show();
		}
	}
	return false;
};

/**
 * Handle focus being lost.
 *
 * The event is actually generated from a mousedown on an element outside the menu, so it is not
 * a normal blur event object.
 *
 * @method
 * @param {jQuery.Event} e Mouse down event
 */
ve.ui.DropdownTool.prototype.onBlur = function ( e ) {
	if ( e.which === 1 ) {
		this.menu.hide();
	}
};

/**
 * Handle one of the items in the menu being selected.
 *
 * This should not be overridden in subclasses, it simple connects events from the internal menu
 * to the onSelect method.
 *
 * @method
 * @param {ve.ui.MenuItemWidget|null} item Selected menu item, null if none is selected
 */
ve.ui.DropdownTool.prototype.onMenuItemSelect = function ( item ) {

	if ( this.toolbar.getSurface().isEnabled() ) {
		this.setLabel( item && item.$label.text() );
		this.onSelect( item );
	}
};

/**
 * Handle dropdown option being selected.
 *
 * This is an abstract method that must be overridden in a concrete subclass.
 *
 * @abstract
 * @method
 * @param {ve.ui.MenuItemWidget} item Menu item
 */
ve.ui.DropdownTool.prototype.onSelect = function () {
	throw new Error(
		've.ui.DropdownTool.onSelect not implemented in this subclass:' + this.constructor
	);
};

/**
 * Set the label.
 *
 * If the label value is empty, undefined or only contains whitespace an empty label will be used.
 *
 * @method
 * @param {jQuery|string} [value] Label text
 * @chainable
 */
ve.ui.DropdownTool.prototype.setLabel = function ( value ) {
	if ( typeof value === 'string' && value.length && /[^\s]*/.test( value ) ) {
		this.$labelText.text( value );
	} else if ( value instanceof jQuery ) {
		this.$labelText.empty().append( value );
	} else {
		this.$labelText.html( '&nbsp;' );
	}
	return this;
};
