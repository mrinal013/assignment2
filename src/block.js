const { registerBlockType } = wp.blocks;

const Quote_Block = registerBlockType( 'assignment/quote-block', {
	title: 'Basic Example',
	icon: 'smiley',
	category: 'layout',
	edit: ( { className } ) => <div className={ className }>Hello World!</div>,
	save: () => <div>Hello World!</div>,
} );

export default Quote_Block;