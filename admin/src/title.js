const { __ } = wp.i18n;
const { compose } = wp.compose;
const { withSelect, withDispatch } = wp.data;
 
const { PluginDocumentSettingPanel } = wp.editPost;
const { ToggleControl, TextControl, PanelRow } = wp.components;

 
const Component = ( { postType, postMeta, setPostMeta } ) => {
	return(
		<PluginDocumentSettingPanel title={ __( 'My Custom Post meta', 'txtdomain') } initialOpen="true">
			<PanelRow>
				<TextControl
					label={ __( 'Write some text, if you like', 'txtdomain' ) }
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
] )( Component );