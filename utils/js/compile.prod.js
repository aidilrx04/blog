import { readFileSync, writeFileSync } from 'fs';
import { execSync } from 'child_process';
import { fileURLToPath } from 'url';
import path from 'path';

// __dirname equivalent in ESM
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Path to lastcommit.txt in same dir as this script
const lastCommitFile = path.join(__dirname, 'lastcommit.txt');
// Path for blog.zip at project root
const blogZipPath = path.join(process.cwd(), 'blog.zip');

try {
  // 1. Read last commit id
  let lastCommit = '';
  try {
    lastCommit = readFileSync(lastCommitFile, 'utf8').trim();
  } catch {
    console.log('No lastcommit.txt found, assuming first run.');
  }

  // 2. Get current commit id
  const currentCommit = execSync('git rev-parse HEAD').toString().trim();

  if (lastCommit && lastCommit !== currentCommit) {
    // 3. Get changed files only
    const diffFiles = execSync(`git diff --name-only ${lastCommit} ${currentCommit}`, {
      encoding: 'utf8'
    }).trim();

    if (diffFiles) {
      const files = diffFiles.split('\n');

      // ⚠️ Warning if migration files changed
      const migrationChanged = files.some(f => f.startsWith('databases/migrations/'));
      if (migrationChanged) {
        console.warn('\n⚠️ WARNING: Changes detected in databases/migrations/ — check if migrations need to be applied!');
      }

      // Extract only top-level dirs (deduplicated)
      const topDirs = [...new Set(files.map(f => f.split('/')[0]))];

      // Always include public_html/build
      const dirsToZip = [...new Set([...topDirs, 'public_html/build'])];

      console.log('\nZipping:\n' + dirsToZip.join('\n'));

      // 4. Create blog.zip at project root
      try { execSync(`rm -f "${blogZipPath}"`); } catch {}

      execSync(`zip -r "${blogZipPath}" ${dirsToZip.join(' ')}`, { stdio: 'inherit' });

      console.log(`\n✅ Created ${blogZipPath}`);
    } else {
      console.log('No file changes detected.');
    }
  } else if (lastCommit === currentCommit) {
    console.log('No new commits since last run.');
  }

  // 5. Update lastcommit.txt
  writeFileSync(lastCommitFile, currentCommit, 'utf8');
} catch (err) {
  console.error('Error:', err.message);
}
