

package biblioteca;

public class UsuarioOcasional extends Usuario{
    private static final int maxPrestamosAUsuariosO=2;
    private static final int limitePrestamosAUsuariosO=15;

    public UsuarioOcasional(){
        super();
    }
    public UsuarioOcasional(String dni,String nom){
        super(dni,nom,maxPrestamosAUsuariosO,limitePrestamosAUsuariosO);
    }
    public String toString(){
        return super.toString() + "Usuario Ocasional";
    }
}
