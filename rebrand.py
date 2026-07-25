import os
import re

directory = '/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms'

def rebrand(content):
    content = re.sub(r'\bWPINC\b', 'ZCINC', content)
    content = re.sub(r'\bWordPress\b', 'ZelocoreCMS', content)
    content = re.sub(r'\bwordpress\b', 'zelocorecms', content)
    content = re.sub(r'\bWORDPRESS\b', 'ZELOCORECMS', content)
    return content

for root, dirs, files in os.walk(directory):
    if '.git' in root or 'node_modules' in root:
        continue
    for file in files:
        if not file.endswith(('.php', '.js', '.css', '.html', '.txt', '.md', '.json', '.xml')):
            continue
        filepath = os.path.join(root, file)
        
        try:
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            new_content = rebrand(content)
            
            if new_content != content:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
        except Exception as e:
            pass
