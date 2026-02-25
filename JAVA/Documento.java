/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;

/**
 *
 * @author carmen
 */
public class Documento {
    private String codigo;
    private String titulo;
    private Usuario prestadoA;


    public Documento(){
        codigo=null;
        titulo=null;
        prestadoA=null;
    }
    public Documento(String cod,String til){
        codigo=cod;
        titulo=til;
        prestadoA=null;
    }
    public boolean estaPrestado(){
        if (prestadoA!=null)
            return true;
        return false;
    }
    public void prestaAUsuario(Usuario user){
        if (prestadoA!=null)
            System.out.println("Prestado a "+prestadoA.getNombre());
        else{
            prestadoA=user;
            user.añadeDocumentoPrestado(this);
        }
    }
    public void devuelve(){
        prestadoA.eliminaDocumentoPrestado(codigo);
        prestadoA=null;
    }
    public int plazoPrestamo(){
        if (prestadoA!=null){
            return prestadoA.plazoPrestamoDocumento();
        }
        return -1;
    }
    public String getCodigo() {
        return codigo;
    }
    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }
    public String getTitulo() {
        return titulo;
    }
    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }
    public Usuario getPrestadoA() {
        return prestadoA;
    }
    public void setPrestadoA(Usuario prestadoA) {
        this.prestadoA = prestadoA;
    }
    public String toString(){
        return "Código: "+ codigo + "Título: " + titulo + " Prestado a: " + prestadoA + "\n";
    }
}
