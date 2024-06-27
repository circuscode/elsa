/**
 * Creator Block
 * 
 * @package elsa
 * @since 0.1
 */

( function() {
	
	// Internationalization
	var __ = wp.i18n.__;
	// Creating Elements
	var el = wp.element.createElement;
	// Register Blocks
	var registerBlockType = wp.blocks.registerBlockType;

	/**
	 * Register Basic Block.
	 *
	 * Registers a new block provided a unique name and an object defining its
	 * behavior. Once registered, the block is made available as an option to any
	 * editor interface where blocks are implemented.
	 *
	 * @param  {string}   name     Block name.
	 * @param  {Object}   settings Block settings.
	 * @return {?WPBlock}          The block, if it has been successfully
	 *                             registered; otherwise `undefined`.
	 */

	registerBlockType( 'elsa/creator', {

		title: 'Creator',
		icon: 'groups', 
		category: 'theme',

		edit: 
		function( props ) {
			
			var elsa_creator_html = BlockParams.creator_content ;
			return elsa_creator_html;
		
		},

		save: function( props ) {

			var elsa_creator_html = BlockParams.creator_content ;
			// Rending is made via PHP-Fallback function
			return null;
		},

	} ); // Register Block Type
	
})(); // function