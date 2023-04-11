const { __ } = wp.i18n;
const { PluginDocumentSettingPanel } = wp.editPost;
const { PanelRow } = wp.components;
 
const Movie_Title = () => {
	return(
		<PluginDocumentSettingPanel title={ __( 'My Custom Post meta', 'txtdomain') } initialOpen="true">
			<PanelRow>
				Hello there.
			</PanelRow>
		</PluginDocumentSettingPanel>
	);
}
 
export default Movie_Title;