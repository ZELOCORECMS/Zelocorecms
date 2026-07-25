import os
import re

directory = '/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms'

patterns = {
    'WPINC': re.compile(r'\bWPINC\b'),
    'WP_': re.compile(r'\bWP_'),
    'wp_': re.compile(r'\bwp_'),
    'wp-': re.compile(r'\bwp-'),
    'wordpress': re.compile(r'wordpress', re.IGNORECASE)
}

counts = {k: 0 for k in patterns}

for root, dirs, files in os.walk(directory):
    if '.git' in root:
        continue
    for file in files:
        if not file.endswith(('.php', '.js', '.css', '.html', '.txt', '.md', '.json')):
            continue
        filepath = os.path.join(root, file)
        try:
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
                for k, p in patterns.items():
                    counts[k] += len(p.findall(content))
        except Exception as e:
            pass

print(counts)
