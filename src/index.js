const { registerPlugin } = wp.plugins;
const { registerBlockType } = wp.blocks;

import Movie_Title from './panel';
// import Movie_Quote from './block';

registerBlockType( 'assignment2/test-block', {
	title: 'Basic Example',
	icon: 'smiley',
	category: 'layout',
	edit: ( { className } ) => <div className={ className }>Hello World!</div>,
	save: () => <div>Hello World!</div>,
} );