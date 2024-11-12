# Location Post Generator

**Plugin Name**: Location Post Generator  
**Description**: A WordPress plugin to dynamically create posts for multiple locations with custom titles, content, tags, and meta descriptions.  
**Version**: 1.1  
**Author**: Firoz

## Description

The Location Post Generator plugin allows you to quickly generate multiple posts for different locations with customized content. You can define a template with placeholders for `{location}`, which will be automatically replaced with each specified location. The plugin also supports rich text editing with the TinyMCE editor, enabling you to format your content easily.

## Features

- Add a list of locations to automatically create posts for each location.
- Use a content template with `{location}` placeholders, which will dynamically replace each location name.
- Customize post title, tags, and meta descriptions for each generated post.
- Full rich text editor (TinyMCE) support for content formatting and media embedding.

## Installation

1. Download the plugin files and upload them to your `wp-content/plugins/location-post-generator` directory, or install it via the WordPress Plugin Installer.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

1. Go to **Location Posts** in the WordPress Admin Dashboard menu.
2. In the **Location Post Generator** page:
   - **Enter Locations**: Provide a comma-separated list of locations (e.g., `New York, Los Angeles, Chicago`).
   - **Post Content Template**: Use the rich text editor to enter the content template. You can use `{location}` as a placeholder for the location name. For example, `Welcome to our store in {location}!`.
3. Click **Generate Posts** to automatically create posts for each location.

## Example

If you enter the following:

- **Locations**: `New York, Los Angeles`
- **Post Content Template**: `Visit our amazing store in {location}!`

The plugin will create posts with:
- **Post Titles**: `Visit Us in New York`, `Visit Us in Los Angeles`
- **Post Content**: `Visit our amazing store in New York!`, `Visit our amazing store in Los Angeles!`
- **Tags**: Each post will be tagged with the corresponding location, `city store`, and `retail`.
- **Meta Description**: Each post will have a meta description like `Find our store in New York and enjoy amazing offers!`.

## Changelog

### Version 1.1
- Added support for TinyMCE rich text editor in content templates.

### Version 1.0
- Initial release with location-based post generation.

## Contributing

If you'd like to contribute, please fork the repository and submit a pull request.

## License

This plugin is open-source and licensed under the [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).
