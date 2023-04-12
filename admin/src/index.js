const { registerPlugin } = wp.plugins;
const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { ToggleControl, PanelBody, PanelRow, CheckboxControl, SelectControl, ColorPicker } = wp.components;

import Component from './title';

registerPlugin( 'movie-title-plugin', {
    render() {
        return(<Component />);
    }
} );