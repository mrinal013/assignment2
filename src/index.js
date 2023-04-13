const { registerBlockType } = wp.blocks;
import { useBlockProps, RichText } from '@wordpress/block-editor';


registerBlockType( 'movie/quote-block', {
	title: 'Favourite movie quote',
	icon: 'smiley',
	category: 'layout',
	attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
	edit: (props) => {
		const {
            attributes: { content },
            setAttributes,
            className,
        } = props;
        const blockProps = useBlockProps();
        const onChangeContent = ( newContent ) => {
            setAttributes( { content: newContent } );
        };
        return (
            <RichText
                { ...blockProps }
                tagName="p"
                onChange={ onChangeContent }
                value={ content }
            />
        );
    },
	save: ( props ) => {
        const blockProps = useBlockProps.save();
        return (
            <RichText.Content
                { ...blockProps }
                tagName="p"
                value={ props.attributes.content }
            />
        );
    },
} );