# Comandos Rust - Guia de Referência

## Criar Novo Projeto

```powershell
# Criar novo projeto (nome não pode começar com número)
cd rust
cargo new a00002_nome_do_projeto
```

**Nota:** Nomes de packages no Rust não podem começar com dígitos. Use um prefixo como `a` ou `p`.

## Compilar e Executar Projetos Individuais

### Dentro da pasta do projeto:
```powershell
cd rust\a00001_merge_strings_eu
cargo run                    # Compila e executa
cargo build                  # Apenas compila
cargo check                  # Verifica erros sem gerar binário (mais rápido)
```

### Da raiz do workspace:
```powershell
# Executar um projeto específico
cargo run -p a00001_merge_strings_eu
cargo run -p a00001_merge_strings_ia

# Compilar um projeto específico
cargo build -p a00001_merge_strings_eu
```

## Comandos do Workspace

```powershell
# Compilar todos os projetos
cargo build --workspace

# Verificar todos os projetos
cargo check --workspace

# Limpar todos os builds
cargo clean
```

## Flags Úteis

```powershell
# Compilar com otimizações (release mode)
cargo build --release
cargo run --release

# Executar sem output de compilação
cargo run --quiet

# Ver mais detalhes durante compilação
cargo build --verbose
```

## Compilação Direta com rustc (sem Cargo)

```powershell
# Compilar um arquivo .rs individual
rustc rust/arquivo.rs -O -o rust/arquivo.exe

# Executar
.\rust\arquivo.exe

# Compilar sem debug info (não gera .pdb)
rustc -C debuginfo=0 rust/arquivo.rs -O -o rust/arquivo.exe
```

## Estrutura do Workspace

- **Cargo.toml (raiz)**: Define o workspace e lista todos os projetos
- **rust/nome_projeto/**: Cada pasta é um projeto independente
- **rust/nome_projeto/Cargo.toml**: Manifesto de cada projeto
- **rust/nome_projeto/src/main.rs**: Código principal

## Resolver Problemas

```powershell
# Recarregar rust-analyzer (se não detectar projetos)
# No VS Code: Ctrl+Shift+P → "Developer: Reload Window"

# Limpar e recompilar tudo
cargo clean
cargo build --workspace

# Ver versão do Rust
rustc --version
cargo --version
```
