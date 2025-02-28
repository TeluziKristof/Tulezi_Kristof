import { defineStore } from "pinia";
import { api } from "src/boot/axios";

// === INTERFACES ===
// Convert JSON document to TS Interface quickly: https://transform.tools/json-to-typescript

export interface IHirdetes {
  hirdetoId?: number; 
  nev?: string; 
  telSzam?: string; 
  email?: string; 

  hirdetesId?: number; 
  hirdetesCim?: string; 
  kepUrl?: string; 
  ar?: number; 
  leiras?: string | null; 

  marka?: string; 
  modell?: string; 
  kivitel?: string; 
  evjarat?: number;

  kmOraAllas?: number; 
  szallithatoSzemelySzama?: number; 
  ajtokSzama?: number; 
  uzemanyag?: string; 
  hengerurtartalom?: number; 
  teljesitmeny?: number; 
}

export interface IHirdetesCardView {
  hirdetesId?: number;
  kepUrl?: string;
  felhasznaloNev?: string; 
  hirdetesCim?: string;
  uzemanyag?: string; 
  evjarat?: number; 
  ar?: number; 
  leiras?: string | null; 
}

// Interface for state
interface IState {
  hirdetesek: {
    document: any;
    documentOld: any;
    documents: Array<any>;
  };
  isLoading: boolean;
}

// Explicit type for actions
interface IActions {
  getHirdetesek(): Promise<void>;
  getCardHirdetesek(): Promise<void>;
  getHirdetesById(id: number): Promise<void>;
  createHirdetes(): Promise<void>;
}

export const useStore = defineStore<"store", IState, {}, IActions>("store", {
  state: (): IState => ({
    hirdetesek: {
      document: {},
      documentOld: {},
      documents: [],
    },
    isLoading: false,
  }),
  actions: {
    async getHirdetesek(): Promise<void> {
      this.hirdetesek.documents = [];
      try {
        const res = await api.get("/hirdetesek/tabla");
        if (res?.data) {
          this.hirdetesek.documents = res.data;
        }
      } catch (error) {
        console.log(error);
      }
    },
    async getCardHirdetesek(): Promise<void> {
      this.hirdetesek.documents = [];
      try {
        const res = await api.get("/hirdetesek/kartyak");
        if (res?.data) {
          this.hirdetesek.documents = res.data;
        }
      } catch (error) {
        console.log(error);
      }
    },

    async getHirdetesById(id: number): Promise<void> {
      this.isLoading = true; 
      this.hirdetesek.document = {};

      if (!id) {
        console.error("HIBA: Nincs ID megadva!");
        return;
      }

      try {
        const res = await api.get(`/hirdetesek/reszletek/${id}`); 
        if (res?.data) {
          this.hirdetesek.document = res.data; 
          this.hirdetesek.documentOld = { ...res.data };
          console.log("Betöltött termék:", this.hirdetesek.document);
        }
      } catch (error) {
        console.error("Hiba a termék betöltésekor:", error);
      } finally {
        this.isLoading = false;
      }
    },

    async createHirdetes(): Promise<void> {
      if (!this.hirdetesek?.document) {
        console.log("Nincs feltöltendő termék!");
        return;
      }
    
      try {
        const res = await api.post("/hirdetesek", this.hirdetesek.document); 
        if (res?.data) {
          await this.getHirdetesek(); 
          console.log(`Az új id=${res.data.id} létrejött!`);
        }
      } catch (error) {
        console.log("Hiba a hirdetés létrehozása közben:", error);
      }
    },
    
  },
});
