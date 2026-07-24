import os
import re

def rebrand_content(content):
    # Replacements
    replacements = [
        (r'Theme Name:\s*Assembler', 'Theme Name: Zelocorecms Theme'),
        (r'Theme URI:\s*https://wordpress\.com/themes/assembler/?', 'Theme URI: https://zelocorecms.com/themes/zelocorecms-theme/'),
        (r'Description:\s*Assemble something beautiful\.', 'Description: The official theme for Zelocorecms.'),
        (r'Author:\s*Automattic', 'Author: P.J.Borgohain'),
        (r'Author URI:\s*https://automattic\.com/?', 'Author URI: https://zelocorecms.com/'),
        (r'Text Domain:\s*assembler', 'Text Domain: zelocorecms-theme'),
        
        # Other terms
        (r'\bassembler\b', 'zelocorecms-theme'),
        (r'\bAssembler\b', 'Zelocorecms Theme'),
        (r'theme-assembler', 'theme-zelocorecms-theme'),
        (r'wpcom', 'zelocorecms'),
    ]
    
    for pattern, replacement in replacements:
        content = re.sub(pattern, replacement, content)
        
    return content

def main():
    theme_dir = "/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms/themes/zelocore-theme"
    
    # Process all text files in the theme
    for root, dirs, files in os.walk(theme_dir):
        for filename in files:
            # skip binary files
            if filename.endswith(('.png', '.jpg', '.jpeg', '.gif', '.zip')):
                continue
                
            filepath = os.path.join(root, filename)
            
            try:
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()
                    
                new_content = rebrand_content(content)
                
                if new_content != content:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
            except Exception as e:
                print(f"Error processing {filepath}: {e}")
                
    print("Theme rebranded successfully.")

if __name__ == "__main__":
    main()
