const { __ } = wp.i18n;
const { compose } = wp.compose;
const { withSelect, withDispatch } = wp.data;
const { PluginDocumentSettingPanel } = wp.editPost;
const { TextControl, PanelRow } = wp.components;
 
const Movie_Title = ( { postType, postMeta, setPostMeta } ) => {
    
    if ( 'movie' !== postType ) return null;  // Will only render component for post type 'movie'

	return(
		<PluginDocumentSettingPanel title={ __( 'Movie Title', 'assignment2') } initialOpen="true">
			<PanelRow>
                <TextControl
					value={ postMeta._movie_title }
					onChange={ ( value ) => setPostMeta( { _movie_title: value } ) }
				/>
			</PanelRow>
		</PluginDocumentSettingPanel>
	);
}

export default compose( [
	withSelect( ( select ) => {		
		return {
			postMeta: select( 'core/editor' ).getEditedPostAttribute( 'meta' ),
			postType: select( 'core/editor' ).getCurrentPostType(),
		};
	} ),
	withDispatch( ( dispatch ) => {
		return {
			setPostMeta( newMeta ) {
				dispatch( 'core/editor' ).editPost( { meta: newMeta } );
			}
		};
	} )
] )( Movie_Title );