module.exports = {
	options: {
		overwrite: false
	},
	theme: {
		src: './wp-theme',
		dest: '<%= helperpress.build_dir %>/wp-content/themes/<%= helperpress.wp.theme.slug %>'
	},
	uploads: {
		src: './uploads',
		dest: '<%= helperpress.build_dir %>/wp-content/uploads'
	},
	sites: {
		src: '<%= helperpress.build_dir %>',
		dest: '<%= helperpress.apache.sites_dir %>/<%= helperpress.wp.theme.slug %>'
	}
};