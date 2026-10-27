# Mike's Morsels

WordPress child theme (`wp-content/themes/mike-hall-masonry/`) for www.mikesmorsels.com, on
the parent theme Pinbin from wordpress.org. The repo root is the WordPress install; only
the child theme is tracked and ships.

## What this project is

- **The parent theme is never edited.** Pinbin updates through WordPress, or is held, and
  is not in the repo. A change to how a parent template renders goes in the child theme
  as an override. `editor-style.css` exists for that reason: its two declarations, which
  size the classic editor's content area, were once an edit to Pinbin's own
  `editor-style.css`. WordPress loads the parent's editor stylesheet and then the child's,
  through Pinbin 1.4.7's `add_editor_style()` call, so the child's wins.
- **The child theme is built on Pinbin 1.4.7.** It imports the parent's stylesheet
  (`@import url("../pinbin/style.css")`) and overrides `header.php`, `footer.php`,
  `index.php` and `single.php`, written against 1.4.7's markup: `#post-area`,
  `.pinbin-image`, the `main_nav` menu location and the `summary-image` image size. The
  masonry grid is the parent's jQuery Masonry.
- **Pinbin 2.x is a rebuild, not an update.** 2.1.0 describes itself as "a ground-up
  rebuild: no jQuery, a CSS-native grid, full block editor support". Its `style.css`
  holds only the theme header (the styles moved to `assets/css/main.css`), and `js/`,
  `options/` and `editor-style.css` are gone. On 2.x the child would import an empty
  stylesheet and lose its grid. wordpress.org still serves 1.4.7
  (`downloads.wordpress.org/theme/pinbin.1.4.7.zip`).

## Repo-local facts

- **Deploy:** a push to `main` runs `.github/workflows/deploy.yml`, which rsyncs the child
  theme folder to the hosting.com cPanel account `mbmsdcloudlab` (`--delete`, sparing the
  server's `.ftpquota`). Its key is `~/.ssh/mm_deploy_ed25519` (secret `DEPLOY_SSH_KEY`),
  authorised as `github-actions-deploy` on that account only. Only the child theme ships;
  core, plugins, the parent theme, uploads and the database live on the server.
- **Local:** Docker at `C:\DockerLocal\sites\mikes-morsels`, `https://morsels.test`. The
  child theme is bind-mounted, so edits show on refresh. The rest of `wp/` on disk is a
  mirror of the Docker volume, refreshed by each update pass; nothing there is edited by
  hand. Each update pass owns the local setup and versions; for those, read Krang's
  `projects/sites.yml` and `projects/roster.md`, or the container.
- **Plugins the child theme leans on:** Classic Editor and Classic Widgets are active. The
  child's `functions.php` filters Soliloquy's slider captions (`soliloquy_output_caption`)
  and the RSS excerpt.
- **Updates** of plugins, the parent theme, core and PHP follow Krang's
  `runbooks/wordpress-update-pass.md`. Holds, and their reasons, are in Krang's
  `projects/sites.yml`.
- Commit messages: `type(scope): subject`.
