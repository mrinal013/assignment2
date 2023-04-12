import Movie_Title from './movie-title';

const { registerPlugin } = wp.plugins;
 
const Meta = registerPlugin( '_movie_title_plugin', {
	render() {
		return(<Movie_Title />);
	}
} );

export default Meta;

